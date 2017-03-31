<?php

use yii\db\Migration;

class m170331_062510_add_column_partner_clients_id_user extends Migration
{
    public function up()
    {
        $this->addColumn("potential_clients", "id_user", $this->integer());
    }

    public function down()
    {
        $this->dropColumn("potential_clients", "id_user");
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
