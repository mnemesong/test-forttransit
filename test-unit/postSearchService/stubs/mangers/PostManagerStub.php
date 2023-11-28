<?php

namespace Pantagruel74\TestUnit\postSearchService\stubs\mangers;

use components\postSearchService\managers\PostManagerInterface;
use components\postSearchService\records\PostCategoryRecInterface;
use components\postSearchService\records\PostRecInterface;
use components\postSearchService\request\PostReqDto;
use Webmozart\Assert\Assert;

/* @property PostRecInterface[] $posts */
class PostManagerStub implements PostManagerInterface
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

    /* @return PostRecInterface[] */
    public function searchPosts(
        ?string $nameFilterSubstr,
        ?string $categoryFilterId,
        ?string $authorFilterId,
        int     $limit,
        int     $offset
    ): array {
        $filteredByTitle = empty($nameFilterSubstr)
            ? $this->posts
            : array_filter(
                $this->posts,
                fn(PostRecInterface $pri) =>
                    stripos($pri->getTitle(), $nameFilterSubstr) !== false
            );
        $filteredByCategory = empty($categoryFilterId)
            ? $filteredByTitle
            : array_filter(
                $filteredByTitle,
                fn(PostRecInterface $pri) =>
                    in_array(
                        $categoryFilterId,
                        array_map(
                            fn(PostCategoryRecInterface $pcri) => $pcri->getId(),
                            $pri->getCategories()
                        )
                    )
            );
        $filteredByAuthor = empty($authorFilterId)
            ? $filteredByCategory
            : array_filter(
                $filteredByCategory,
                fn(PostRecInterface $pri) =>
                    ($pri->getAuthor()->getId() === $authorFilterId)
            );
        $offseted = array_filter(
            $filteredByAuthor,
            fn(int $i) => ($i >= $offset),
            ARRAY_FILTER_USE_KEY
        );
        $limited = array_filter(
            array_values($offseted),
            fn (int $i) => ($i < $limit),
            ARRAY_FILTER_USE_KEY
        );
        return $limited;
    }
}