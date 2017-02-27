<?php

use yii\db\Migration;

/**
 * Handles the creation of table `objects`.
 */
class m170227_094222_create_objects_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('objects', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('objects');
    }
}
