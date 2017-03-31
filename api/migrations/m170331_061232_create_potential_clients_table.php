<?php

use yii\db\Migration;

/**
 * Handles the creation of table `potential_clients`.
 */
class m170331_061232_create_potential_clients_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('potential_clients', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'id_status' => $this->integer(),
            'state' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('potential_clients');
    }
}
