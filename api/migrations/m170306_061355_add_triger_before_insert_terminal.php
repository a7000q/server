<?php

use yii\db\Migration;

class m170306_061355_add_triger_before_insert_terminal extends Migration
{
    public function up()
    {
        $sql = '
           
           CREATE TRIGGER `insert_terminals` BEFORE INSERT ON `terminals`
                FOR EACH ROW
                BEGIN
                    SET NEW.token = MD5(NEW.id_object+UNIX_TIMESTAMP());
                END;
        ';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = '
            DROP TRIGGER IF EXISTS `insert_terminals`;
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
