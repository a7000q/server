<?php

use yii\db\Migration;

class m170315_143127_add_triger_update_partner_inpayments extends Migration
{
    public function up()
    {
        $sql = '
           
           CREATE TRIGGER `update_partner_inpayments` AFTER UPDATE ON `partner_inpayments`
                FOR EACH ROW
                BEGIN
                     SET @sum := (SELECT SUM(`sum`) FROM `partner_inpayments` WHERE `id_partner` = new.id_partner);
                     UPDATE `partners` SET `debit` = @sum WHERE `partners`.`id` = new.id_partner;
                END;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `update_partner_inpayments`;
        ';

        $this->execute($sql);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
