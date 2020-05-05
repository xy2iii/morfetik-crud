<?php

use yii\db\Migration;

/**
 * Class m200429_044618_init_rbac
 */
class m200429_044618_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $manageUser = $auth->createPermission('manageUser');
        $manageUser->description = 'Allows to add, modify and delete other users.';
        $auth->add($manageUser);

        $edit = $auth->createPermission('edit');
        $edit->description = 'Allows access to the edition interface.';
        $auth->add($edit);

        // add "user" role with no permissions
        $user = $auth->createRole('user');
        $auth->add($user);

        // add "editor" role and give this role the "edit" permission
        $editor = $auth->createRole('editor');
        $auth->add($editor);
        $auth->addChild($editor, $manageUser);

        // add "admin" role and give this role the "manageUser" permission
        // as well as the permissions of the "editor" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $manageUser);
        $auth->addChild($admin, $editor);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 100);
        $auth->assign($editor, 101);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200429_044618_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
