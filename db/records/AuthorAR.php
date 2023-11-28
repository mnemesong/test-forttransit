<?php

namespace db\records;

use components\postSearchService\records\AuthorRecInterface;
use Webmozart\Assert\Assert;
use yii\db\ActiveRecord;

/**
 * @property string $id
 * @property string $fullName
 * @property string $birthDate
 * @property string $biography
 */
class AuthorAR extends ActiveRecord implements
    AuthorRecInterface
{
    public static function tableName(): string
    {
        return '{{%authors}}';
    }

    public function getId(): string
    {
        Assert::notEmpty($this->id,
            "Id should be not empty for author record");
        return $this->id;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function getBirthDate(): \DateTime
    {
        if(empty($this->birthDate)) {
            throw new \Error("BirthDate is not exists for Author: "
                . $this->id);
        }
        return new \DateTime($this->birthDate);
    }

    public function getBiography(): string
    {
        return $this->biography;
    }
}