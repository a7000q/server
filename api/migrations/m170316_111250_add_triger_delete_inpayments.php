<?php

use yii\db\Migration;

class m170316_111250_add_triger_delete_inpayments extends Migration
{
    public function up()
    {
        $sql = '
           
           CREATE TRIGGER `delete_partner_inpayments` AFTER DELETE ON `partner_inpayments`
                FOR EACH ROW
                BEGIN
                     SET @sum := (SELECT SUM(`sum`) FROM `partner_inpayments` WHERE `id_partner` = OLD.id_partner);
                     UPDATE `partners` SET `debit` = @sum WHERE `partners`.`id` = OLD.id_partner;
                END;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `delete_partner_inpayments`;
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
