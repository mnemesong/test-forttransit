<?php

use yii\db\Migration;
use db\records\PostAR;

/**
 * Handles the creation of table `{{%posts}}`.
 */
class m231128_165651_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(PostAR::tableName(), [
            'id' => $this->string(128)->unique()->notNull(),
            'title' => $this->string(256)->defaultValue(''),
            'imgPath' => $this->string(256)->defaultValue(''),
            'announce' => $this->string(1024)->defaultValue(''),
            'text' => $this->text(),
            'authorId' => $this->string(128)->notNull(),
        ]);
        $this->addPrimaryKey(
            'posts_pk',
            PostAR::tableName(),
            ['id']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(PostAR::tableName());
    }
}
