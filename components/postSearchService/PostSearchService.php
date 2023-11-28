<?php

namespace components\postSearchService;

use components\postSearchService\managers\PostManagerInterface;
use components\postSearchService\request\PostReqDto;
use components\postSearchService\response\PostRespDto;

class PostSearchService
{
    protected PostManagerInterface $postManager;

    /**
     * @param PostManagerInterface $postManager
     */
    public function __construct(PostManagerInterface $postManager)
    {
        $this->postManager = $postManager;
    }

    public function searchPosts(PostReqDto $postReq): PostRespDto
    {
        $limit = $postReq->getPageSize();
        $offset = $postReq->getPageN() * $postReq->getPageSize();
        $searchResult = $this->postManager->searchPosts(
            $postReq->getNameFilterSubstr(),
            $postReq->getCategoryFilterId(),
            $postReq->getAuthorFilterId(),
            $limit,
            $offset
        );
        return new PostRespDto($searchResult);
    }
}