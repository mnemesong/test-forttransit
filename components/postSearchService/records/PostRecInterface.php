<?php

namespace components\postSearchService\records;

interface PostRecInterface
{
    public function getId(): string;

    public function getTitle(): string;

    public function getImgUrl(): string;

    public function getAnnounce(): string;

    public function getText(): string;

    public function getAuthor(): AuthorRecInterface;

    /* @return PostCategoryRecInterface[] */
    public function getCategories(): array;
}