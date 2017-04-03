<?php

use yii\db\Migration;

/**
 * Handles the creation of table `potential_client_events`.
 */
class m170403_084853_create_potential_client_events_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('potential_client_events', [
            'id' => $this->primaryKey(),
            'id_client' => $this->integer(),
            'date' => $this->integer(),
            'type' => $this->integer(),
            'description' => $this->string(),
        ]);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('potential_client_events');
    }
}
