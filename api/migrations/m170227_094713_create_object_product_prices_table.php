<?php

use yii\db\Migration;

/**
 * Handles the creation of table `object_product_prices`.
 */
class m170227_094713_create_object_product_prices_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_product_prices', [
            'id' => $this->primaryKey(),
            'id_object' => $this->integer(),
            'id_product' => $this->integer(),
            'price' => $this->float(),
        ]);


        $this->createIndex("idx-object_product_prices-id_object", "object_product_prices", "id_object");
        $this->createIndex("idx-object_product_prices-id_product", "object_product_prices", "id_product");

        $this->addForeignKey("fk-object_product_prices-id_object", "object_product_prices", "id_object", "objects", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("fk-object_product_prices-id_product", "object_product_prices", "id_product", "products", "id", "CASCADE", "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('object_product_prices');
    }
}
