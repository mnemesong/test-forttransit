<?php

namespace components\postSearchService\records;

interface PostCategoryRecInterface
{
    public function getId(): string;

    public function getName(): string;

    public function getDescription(): string;

}