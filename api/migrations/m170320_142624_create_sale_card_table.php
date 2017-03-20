<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sale_card`.
 */
class m170320_142624_create_sale_card_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sale_card', [
            'id' => $this->primaryKey(),
            'id_sale' => $this->integer(),
            'id_card' => $this->integer(),
            'name_card' => $this->string(),
            'id_partner' => $this->integer(),
            'name_partner' => $this->string(),
        ]);

        $this->createIndex("idx-sale_card-id_sale", "sale_card", "id_sale");
        $this->addForeignKey("fk-sale_card-id_sale", "sale_card", "id_sale", "sales", "id", "CASCADE", "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sale_card');
    }
}
