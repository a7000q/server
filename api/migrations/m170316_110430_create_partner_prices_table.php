<?php

use yii\db\Migration;

/**
 * Handles the creation of table `partner_prices`.
 */
class m170316_110430_create_partner_prices_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('partner_prices', [
            'id' => $this->primaryKey(),
            'id_partner' => $this->integer(),
            'id_product' => $this->integer(),
            'price' => $this->decimal(10,2),
        ]);

        $this->createIndex("idx-partner_prices-id_partner", "partner_prices", "id_partner");
        $this->createIndex("idx-partner_prices-id_product", "partner_prices", "id_product");

        $this->addForeignKey("fk-partner_prices-id_partner", "partner_prices", "id_partner", "partners", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("fk-partner_prices-id_product", "partner_prices", "id_product", "products", "id", "CASCADE", "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('partner_prices');
    }
}
