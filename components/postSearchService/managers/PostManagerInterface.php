<?php

namespace components\postSearchService\managers;

use components\postSearchService\records\PostRecInterface;

interface PostManagerInterface
{
    /* @return PostRecInterface[] */
    public function searchPosts(
        ?string $nameFilterSubstr,
        ?string $categoryFilterId,
        ?string $authorFilterId,
        int     $limit,
        int     $offset
    ): array;
}