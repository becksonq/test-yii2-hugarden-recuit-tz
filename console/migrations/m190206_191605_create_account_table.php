<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account}}`.
 */
class m190206_191605_create_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%account}}', [
            'id'       => $this->primaryKey(),
            'email'    => $this->string(),
            'password' => $this->string(),
            'settings' => $this->json(),
            'options'  => $this->json(),
        ]);

        /*$this->insert('{{%account}}', [
            'settings' => '{"color":"#00FF00", "phone":null}',
            'options'  => '{"height":100, "width":100}'
        ]);*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%account}}');
    }
}
