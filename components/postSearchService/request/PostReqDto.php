<?php

namespace components\postSearchService\request;

class PostReqDto
{
    protected int $pageN;
    protected int $pageSize;
    protected ?string $nameFilterSubstr;
    protected ?string $categoryCategoryFilterId;
    protected ?string $authorFilterId;

    /**
     * @param string|null $nameFilterSubstr
     * @param string|null $categoryCategoryFilterId
     * @param string|null $authorFilterId
     * @param int $pageN
     * @param int $pageSize
     */
    public function __construct(
        ?string $nameFilterSubstr,
        ?string $categoryCategoryFilterId,
        ?string $authorFilterId,
        int $pageN = 0,
        int $pageSize = 20
    ) {
        $this->nameFilterSubstr = $nameFilterSubstr;
        $this->categoryCategoryFilterId = $categoryCategoryFilterId;
        $this->authorFilterId = $authorFilterId;
        $this->pageN = $pageN;
        $this->pageSize = $pageSize;
    }

    /**
     * @return int
     */
    public function getPageN(): int
    {
        return $this->pageN;
    }

    /**
     * @return int|null
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function getNameFilterSubstr(): ?string
    {
        return $this->nameFilterSubstr;
    }

    public function getCategoryFilterId(): ?string
    {
        return $this->categoryCategoryFilterId;
    }

    public function getAuthorFilterId(): ?string
    {
        return $this->authorFilterId;
    }
}