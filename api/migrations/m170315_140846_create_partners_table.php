<?php

use yii\db\Migration;

/**
 * Handles the creation of table `partners`.
 */
class m170315_140846_create_partners_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('partners', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'full_name' => $this->string(),
            'inn' => $this->integer(),
            'debit' => $this->decimal(12,2),
            'kredit' => $this->decimal(12,2),
            'limit' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('partners');
    }
}
