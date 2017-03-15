<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sale_cash`.
 */
class m170315_075759_create_sale_cash_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sale_cash', [
            'id' => $this->primaryKey(),
            'id_sale' => $this->integer(),
            'bill_sum' => $this->integer(),
        ]);

        $this->createIndex('idx-sale_cash-id_sale', "sale_cash", "id_sale");
        $this->addForeignKey("fk-sale_cash-id_sale", "sale_cash", "id_sale", "sales", "id", "CASCADE", "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sale_cash');
    }
}
