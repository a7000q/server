<?php

use yii\db\Migration;

class m170403_085050_add_potential_client_events_fk extends Migration
{
    public function up()
    {
        $this->createIndex("idx-potential_client_events-id_client", "potential_client_events", "id_client");
        $this->addForeignKey("fk-potential_client_events-id_client", "potential_client_events", "id_client", "potential_clients", "id", "CASCADE", "CASCADE");

        $this->createIndex("idx-potential_client_events-type", "potential_client_events", "type");
        $this->addForeignKey("idx-potential_client_events-type", "potential_client_events", "type", "potential_client_event_types", "id");
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
