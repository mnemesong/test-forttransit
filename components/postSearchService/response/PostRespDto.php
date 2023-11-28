<?php

namespace components\postSearchService\response;

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

}