<?php

use yii\db\Migration;
use db\records\PostInPostCategoryAR;

/**
 * Handles the creation of table `{{%posts_in_post_categories}}`.
 */
class m231128_170550_create_posts_in_post_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(PostInPostCategoryAR::tableName(), [
            'postId' => $this->string(128)->notNull(),
            'postCategoryId' => $this->string(128)->notNull(),
        ]);
        $this->addPrimaryKey(
            'posts_in_post_categories_pk',
            PostInPostCategoryAR::tableName(),
            ['postId', 'postCategoryId']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(PostInPostCategoryAR::tableName());
    }
}
