<?php

use yii\db\Migration;

/**
 * Handles the creation of table `potential_client_status`.
 */
class m170331_061410_create_potential_client_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('potential_client_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        $this->createIndex("idx-potential_clients-id_status", "potential_clients", "id_status");
        $this->addForeignKey("fk-potential_clients-id_status", "potential_clients", "id_status", "potential_client_status", "id");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('potential_client_status');
    }
}
