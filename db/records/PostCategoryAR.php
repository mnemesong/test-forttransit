<?php

namespace db\records;

use components\postSearchService\records\PostCategoryRecInterface;
use components\validators\UuidValidator;
use yii\db\ActiveRecord;

/**
 * @property string $id
 * @property string $name
 * @property string $description
 */
class PostCategoryAR extends ActiveRecord implements
    PostCategoryRecInterface
{
    public function rules(): array
    {
        return [
            [['id', 'name', 'description'], 'required'],
            ['id', UuidValidator::class],
            ['name', 'string', 'max' => 255],
        ];
    }

    public static function tableName(): string
    {
        return '{{%post_categories}}';
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}