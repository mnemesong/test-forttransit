<?php

namespace Pantagruel74\TestUnit\postSearchService\stubs\records;

use components\postSearchService\records\PostCategoryRecInterface;

class PostCategoryRecStub implements PostCategoryRecInterface
{
    protected string $id;
    protected string $name;
    protected string $description;

    /**
     * @param string $id
     * @param string $name
     * @param string $description
     */
    public function __construct(string $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

}