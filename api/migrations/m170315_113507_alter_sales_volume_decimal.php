<?php

use yii\db\Migration;

class m170315_113507_alter_sales_volume_decimal extends Migration
{
    public function up()
    {
        $this->alterColumn("sales", "volume", $this->decimal(10,2));
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
