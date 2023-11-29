<?php

namespace components\postSearchService\response;

use components\postSearchService\records\AuthorRecInterface;
use components\postSearchService\records\PostCategoryRecInterface;
use components\postSearchService\records\PostRecInterface;
use Webmozart\Assert\Assert;

/* @property PostRecInterface[] $posts */
class PostRespDto
{
    protected array $posts;

    /**
     * @param PostRecInterface[] $posts
     */
    public function __construct(array $posts)
    {
        Assert::allSubclassOf($posts, PostRecInterface::class);
        $this->posts = $posts;
    }

    /**
     * @return array
     */
    public function getPosts(): array
    {
        return $this->posts;
    }

    public function preSerialize(): array
    {
        return array_map(
            fn(PostRecInterface $pri) => $this->preSerializePost($pri),
            $this->posts
        );
    }

    protected function preSerializeAuthor(AuthorRecInterface $authorRec): object
    {
        return (object) [
            'id' => $authorRec->getId(),
            'fullName' => $authorRec->getFullName(),
            'birthDate' => $authorRec->getBirthDate()->format('Y-m-d'),
            'biography' => $authorRec->getBiography(),
        ];
    }

    protected function preSerializePostCategory(
        PostCategoryRecInterface $postCategoryRec
    ): object {
        return (object) [
            'id' => $postCategoryRec->getId(),
            'name' => $postCategoryRec->getName(),
            'description' => $postCategoryRec->getDescription(),
        ];
    }

    protected function preSerializePost(PostRecInterface $postRec): object
    {
        return (object) [
            'id' => $postRec->getId(),
            'title' => $postRec->getTitle(),
            'announce' => $postRec->getAnnounce(),
            'imgUrl' => $postRec->getImgUrl(),
            'text' => $postRec->getText(),
            'author' => $this->preSerializeAuthor($postRec->getAuthor()),
            'categories' => array_map(
                fn(PostCategoryRecInterface $pcri) =>
                    $this->preSerializePostCategory($pcri),
                $postRec->getCategories()
            ),
        ];
    }

}