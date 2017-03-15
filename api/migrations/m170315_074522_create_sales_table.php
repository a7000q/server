<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sales`.
 */
class m170315_074522_create_sales_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sales', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'id_object' => $this->integer(),
            'id_product' => $this->integer(),
            'id_pay' => $this->integer(),
            'volume' => $this->float(),
            'price' => $this->float(),
        ]);

        $this->createIndex('idx-sales-id_object', "sales", "id_object");
        $this->createIndex('idx-sales-id_product', "sales", "id_product");

        $this->addForeignKey("fk-sales-id_object", "sales", "id_object", "objects", "id");
        $this->addForeignKey("fk-sales-id_product", "sales", "id_product", "products", "id");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sales');
    }
}
