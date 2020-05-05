<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\User;

/**
 * Migration that creates the users table, to manage users.
 */
class m200429_083411_yii_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('yii_users', [
            'id'       => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'email'    => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'authKey'  => Schema::TYPE_STRING . ' NOT NULL',
        ]);
        // Create an admin user and add it to the table, in order to log in in the first place.
        $this->insert('yii_users', [
            'id' => 100,
            'username' => 'admin',
            'email' => 'admin@tal.lipn.univ-paris13.fr',
            'password' => Yii::$app->getSecurity()->generatePasswordHash('admin'),
            'authKey' => Yii::$app->security->generateRandomString(),
        ]);
        // Create an editor user.
        $this->insert('yii_users', [
            'username' => 'editor',
            'email' => 'editor@tal.lipn.univ-paris13.fr',
            'password' => Yii::$app->getSecurity()->generatePasswordHash('editor'),
            'authKey' => Yii::$app->security->generateRandomString(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('yii_users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200429_083411_yii_users cannot be reverted.\n";

        return false;
    }
    */
}
