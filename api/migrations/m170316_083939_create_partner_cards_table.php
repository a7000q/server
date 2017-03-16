<?php

use yii\db\Migration;

/**
 * Handles the creation of table `partner_cards`.
 */
class m170316_083939_create_partner_cards_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('partner_cards', [
            'id' => $this->primaryKey(),
            'id_partner' => $this->integer(),
            'id_electro' => $this->string(),
            'name' => $this->string(),
            'id_txt' => $this->integer(),
        ]);

        $this->createIndex("idx-partners_cards-id_partner", "partner_cards", "id_partner");
        $this->addForeignKey("fk-partners_cards-id_partner", "partner_cards", "id_partner", "partners", "id");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('partner_cards');
    }
}
