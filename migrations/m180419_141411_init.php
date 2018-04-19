<?php

use yii\db\Migration;

/**
 * Class m180419_141411_init
 */
class m180419_141411_init extends Migration
{
    const TABLE_NAME = '{{raw_request}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'application_id' => $this->string(),
            'controller_id' => $this->string(),
            'action_id' => $this->string(),
            'raw' => 'text',
            'created_at' => $this->bigInteger(),
            'updated_at' => $this->bigInteger()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180419_141411_init cannot be reverted.\n";

        return false;
    }
    */
}
