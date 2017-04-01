<?php

use yii\db\Migration;

class m170401_085004_del_date_ extends Migration
{
    public function up()
    {
        $this->dropColumn("potential_client_contacts", "date");
    }

    public function down()
    {

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
