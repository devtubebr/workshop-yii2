<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%bills}}`.
 */
class m201104_233517_create_bills_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%bills}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'type' => $this->smallInteger(1)->notNull(), // 1 - Receber | 2 - Pagar
            'date' => $this->date()->notNull(),
            'description' => $this->string(60)->notNull(),
            'amount' => $this->decimal(10, 2)->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);

        $this->addForeignKey('fk_bills_category_id', '{{%bills}}', 'category_id', '{{%categories}}', 'id');

        $this->batchInsert('{{%bills}}', ['category_id', 'type', 'date', 'description', 'amount', 'created_at'], [
            // Salário
            [6, 1, '2020-01-05', 'Salário', 3000, new Expression('NOW()')],
            [6, 1, '2020-01-07', 'Salário Esposa', 3000, new Expression('NOW()')],

            // Cartão de Crédito
            [1, 2, '2020-01-07', 'Joystick do playstation 4', -250, new Expression('NOW()')],
            [1, 2, '2020-01-08', 'Monitor LED 23', -679.90, new Expression('NOW()')],
            [1, 2, '2020-01-08', 'Mousepad Leadership', -2.50, new Expression('NOW()')],

            // Lazer
            [2, 2, '2020-01-10', 'Academia', -70, new Expression('NOW()')],
            [2, 2, '2020-01-10', 'Netflix', -21.90, new Expression('NOW()')],

            // Moradia
            [3, 2, '2020-01-10', 'Condomínio', -300.00, new Expression('NOW()')],

            // Supermercado
            [4, 2, '2020-01-12', 'Compras da quinzena', -224.54, new Expression('NOW()')],

            // Veículo
            [5, 2, '2020-01-14', 'Troca de óleo', -100, new Expression('NOW()')],
            [5, 2, '2020-01-14', 'Combustível', -80, new Expression('NOW()')],
            [5, 2, '2020-01-14', 'Lava Jato', -50, new Expression('NOW()')],
        ]);
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_bills_category_id', '{{%bills}}');
        $this->dropTable('{{%bills}}');
    }
}
