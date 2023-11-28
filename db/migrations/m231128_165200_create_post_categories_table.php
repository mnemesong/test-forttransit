<?php

use yii\db\Migration;
use db\records\PostCategoryAR;

/**
 * Handles the creation of table `{{%post_categories}}`.
 */
class m231128_165200_create_post_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(PostCategoryAR::tableName(), [
            'id' => $this->string(128)->unique()->notNull(),
            'name' => $this->string(255)->defaultValue(''),
            'description' => $this->string(1024)->defaultValue(''),
        ]);
        $this->addPrimaryKey(
            'post_category_pk',
            PostCategoryAR::tableName(),
            ['id']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(PostCategoryAR::tableName());
    }
}
