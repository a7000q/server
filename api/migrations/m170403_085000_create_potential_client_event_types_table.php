<?php

use yii\db\Migration;

/**
 * Handles the creation of table `potential_client_event_types`.
 */
class m170403_085000_create_potential_client_event_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('potential_client_event_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('potential_client_event_types');
    }
}
