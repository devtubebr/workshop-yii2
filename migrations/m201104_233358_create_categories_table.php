<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m201104_233358_create_categories_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);

        $this->batchInsert('{{%categories}}', ['name', 'created_at'], [
            ['Cartão de Crédito', new Expression('NOW()')],
            ['Lazer', new Expression('NOW()')],
            ['Moradia', new Expression('NOW()')],
            ['Supermercado', new Expression('NOW()')],
            ['Veículo', new Expression('NOW()')],
            ['Salário', new Expression('NOW()')],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
