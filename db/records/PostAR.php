<?php

namespace db\records;

use components\postSearchService\records\AuthorRecInterface;
use components\postSearchService\records\PostCategoryRecInterface;
use components\postSearchService\records\PostRecInterface;
use Webmozart\Assert\Assert;
use yii\db\ActiveQueryInterface;
use yii\db\ActiveRecord;

/**
 * @property string $id
 * @property string $title
 * @property string $imgPath
 * @property string $announce
 * @property string $text
 * @property string $authorId
 *
 * @property ?AuthorAR $authorRecord
 * @property PostInPostCategoryAR[] $postInPostCategoryRecords
 */
class PostAR extends ActiveRecord implements
    PostRecInterface
{
    public static function tableName(): string
    {
        return '{{%posts}}';
    }

    public function getId(): string
    {
        Assert::notEmpty($this->id, "Id should be not empty in Post record");
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getImgUrl(): string
    {
        return \Yii::$app->imgPthCalculatorService->pathToUrl($this->imgPath);
    }

    public function getAnnounce(): string
    {
        return $this->announce;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthorRecord(): ActiveQueryInterface
    {
        return $this->hasOne(AuthorAR::class, ['id', 'authorId']);
    }

    public function getAuthor(): AuthorRecInterface
    {
        $authorRec = $this->authorRecord;
        Assert::isAOf(
            $authorRec,
            AuthorAR::class,
            "Post record " . $this->id
            . 'is not has Author, but ever post should has'
        );
        return $authorRec;
    }

    public function getPostInPostCategoryRecords(): ActiveQueryInterface
    {
        return $this->hasMany(PostInPostCategoryAR::class, ['postId' => 'id']);
    }

    /* @return PostCategoryAR[] */
    public function getCategories(): array
    {
        $result = array_reduce(
            $this->postInPostCategoryRecords,
            fn(array $acc, PostInPostCategoryAR $it) => array_merge(
                $acc,
                array_filter(
                    $it->categoryRecords,
                    fn(PostCategoryAR $pc) => !in_array(
                        $pc->id,
                        array_map(
                            fn(PostCategoryAR $inAcc) => $inAcc->id,
                            $acc
                        )
                    )
                )
            ),
            []
        );
        Assert::allIsAOf($result, PostCategoryAR::class);
        return $result;
    }
}