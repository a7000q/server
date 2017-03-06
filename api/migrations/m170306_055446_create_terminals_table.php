<?php

use yii\db\Migration;

/**
 * Handles the creation of table `terminals`.
 */
class m170306_055446_create_terminals_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('terminals', [
            'id' => $this->primaryKey(),
            'id_object' => $this->integer(),
            'name' => $this->string(),
            'token' => $this->string(),
            'date' => $this->integer(),
        ]);

        $this->createIndex("idx-terminals-id_object", "terminals", "id_object");
        $this->addForeignKey("fk-terminals-id_object", "terminals", "id_object", "objects", "id", "CASCADE", "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('terminals');
    }
}
