<?php

use yii\db\Migration;

/**
 * Handles the creation of table `partner_inpayments`.
 */
class m170315_141435_create_partner_inpayments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('partner_inpayments', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'id_partner' => $this->integer(),
            'sum' => $this->decimal(12,2),
        ]);

        $this->createIndex("idx-partner_inpayments-id_partner", "partner_inpayments", "id_partner");
        $this->addForeignKey("fk-partner_inpayments-s_partner", "partner_inpayments", "id_partner", "partners", "id");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('partner_inpayments');
    }
}
