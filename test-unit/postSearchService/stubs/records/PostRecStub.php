<?php

namespace Pantagruel74\TestUnit\postSearchService\stubs\records;

use components\postSearchService\records\AuthorRecInterface;
use components\postSearchService\records\PostCategoryRecInterface;
use components\postSearchService\records\PostRecInterface;
use Webmozart\Assert\Assert;

class PostRecStub implements PostRecInterface
{
    protected string $id;
    protected string $title;
    protected string $imgUrl;
    protected string $announce;
    protected string $text;
    protected AuthorRecInterface $author;
    protected array $categories;

    /**
     * @param string $id
     * @param string $title
     * @param string $imgUrl
     * @param string $announce
     * @param string $text
     * @param AuthorRecInterface $author
     * @param PostCategoryRecInterface[] $categories
     */
    public function __construct(
        string $id,
        string $title,
        string $imgUrl,
        string $announce,
        string $text,
        AuthorRecInterface $author,
        array $categories
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->imgUrl = $imgUrl;
        $this->announce = $announce;
        $this->text = $text;
        $this->author = $author;
        Assert::allSubclassOf($categories, PostCategoryRecInterface::class);
        $this->categories = $categories;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getImgUrl(): string
    {
        return $this->imgUrl;
    }

    /**
     * @return string
     */
    public function getAnnounce(): string
    {
        return $this->announce;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return AuthorRecInterface
     */
    public function getAuthor(): AuthorRecInterface
    {
        return $this->author;
    }

    /**
     * @return array|PostCategoryRecInterface[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }
}