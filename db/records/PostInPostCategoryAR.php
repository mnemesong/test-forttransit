<?php

namespace db\records;

use yii\db\ActiveQueryInterface;
use yii\db\ActiveRecord;

/**
 * @property string $postId
 * @property string $postCategoryId
 *
 * @property PostCategoryAR[] $categoryRecords
 */
class PostInPostCategoryAR extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%posts_in_post_categories}}';
    }

    public function getCategoryRecords(): ActiveQueryInterface
    {
        return $this
            ->hasMany(PostCategoryAR::class, ['id' => 'postCategoryId']);
    }
}