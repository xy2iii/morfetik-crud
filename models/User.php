<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * An User is a user of the site. Users have different roles,
 * managed by an RBAC. To modify roles, modify the init_rbac migration. 
 * Each user can be modified with the AdminController, offering
 * a GridView-like interface. 
 * This table has four fields:
 * - id: the identifier of the user.
 * - username: the user's name.
 * - password: the user's password.
 * - authKey: a key to login, generated randomly by this class.
 * An user of this class need only bother with providing an username and password.
 */
class User extends ActiveRecord implements IdentityInterface
{
    private $_role;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        // If you change the table name, make sure to change it in the yii_users migration too.
        return 'yii_users';
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'role' => Yii::t('app', 'Role'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // Username, password and role are required.
            [['username', 'password'], 'required'],
            // Validate email using the email validator.
            ['email', 'email'],
            // Minimum size on password.
            ['password', 'string', 'min' => 6],
            ['role', 'string'],
            [['role'], 'default', 'value' => 'user'],
        ];
    }

    /**
     * Generates an authorization key for the given user.
     * This should only be called once, when the user is created.
     */
    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
    }

    /**
     * Hashes a passed plain-text password.
     * The users enter a plain-text password: we hash it before saving to the database.
     */
    public function hashPlaintext($password)
    {
        return Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    /**
     * This will run before every modification.
     * If this is a new record, then generate a new auth key.
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        // On new record, add key.
        if ($this->isNewRecord) {
            $this->generateAuthKey();
        }

        // If the password has changed, a new password has been entered in plaintext,
        // so make sure to hash it.
        $changedAttributes = $this->getDirtyAttributes();
        if (isset($changedAttributes['password'])) {
            $this->password = $this->hashPlaintext($this->password);
        }
        return true;
    }

    /**
     * Runs after every modification.
     * After the user is created, add a default role: the 'user' role.
     */
    public function afterSave($insert, $changedAttributes)
    {
        if (!parent::afterSave($insert, $changedAttributes)) {
            return false;
        }

        Yii::debug('aftersave HAS FIRED');
        if ($this->isNewRecord) {
            $newRole = Yii::$app->authManager->getRoles()['user'];
            Yii::$app->authManager->assign($newRole, $this->getId());
        }
        return true;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * A password is valid if it matches its hash after validation.
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $hash = $this->password;
        return Yii::$app->getSecurity()->validatePassword($password, $hash);
    }

    /**
     * Returns the user's current role, as a string.
     * This implements the getter for $_role.
     */
    public function getRole()
    {
        $role = Yii::$app->authManager->getRolesByUser($this->getId());
        // This returns an array of roles, and our user will only have one role
        // at a time. As such, we only need the first (and only) role.
        if (isset(array_keys($role)[0])) {
            return array_keys($role)[0];
        } else {
            // If there is no role set, like when creating a new user,
            // give back a default role.
            return 'none';
        }
    }

    /**
     * Get the role object for the current user.
     */
    public function getRoleObject()
    {
        $role = Yii::$app->authManager->getRolesByUser($this->getId());
        if (isset(array_values($role)[0])) {
            return array_values($role)[0];
        } else {
            throw new \Exception('Attempted to get role object, but role was not set.');
        }
    }

    /**
     * Sets the user's role based on a role name.
     * This implements the setter for $_role.
     */
    public function setRole($roleID)
    {
        $authManager = Yii::$app->authManager;

        // De-assign the current role, except if isn't set.
        $oldRoleName = $this->getRole();
        if ($oldRoleName !== 'none') {
            $oldRole = $this->getRoleObject();
            $authManager->revoke($oldRole, $this->getId());
        }

        // Get the new role and asign it.
        Yii::debug($roleID);
        $newRole = array_values($authManager->getRoles())[$roleID];
        $authManager->assign($newRole, $this->getId());

        $this->_role =  $this->getRole();
    }
}
