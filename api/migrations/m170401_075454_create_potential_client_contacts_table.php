<?php

use yii\db\Migration;

/**
 * Handles the creation of table `potential_client_contacts`.
 */
class m170401_075454_create_potential_client_contacts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('potential_client_contacts', [
            'id' => $this->primaryKey(),
            'id_client' => $this->integer(),
            'date' => $this->integer(),
            'phone' => $this->string(),
            'name' => $this->string(),
            'position' => $this->string(),
        ]);

        $this->createIndex("idx-potential_client_contacts-id_client", "potential_client_contacts", "id_client");
        $this->addForeignKey("fk-potential_client_contacts-id_client", "potential_client_contacts", "id_client", "potential_clients", "id");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('potential_client_contacts');
    }
}
