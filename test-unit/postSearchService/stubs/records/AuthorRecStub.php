<?php

namespace Pantagruel74\TestUnit\postSearchService\stubs\records;

use components\postSearchService\records\AuthorRecInterface;

class AuthorRecStub implements AuthorRecInterface
{
    protected string $id;
    protected string $fullName;
    protected \DateTime $birthDate;
    protected string $biography;

    /**
     * @param string $id
     * @param string $fullName
     * @param \DateTime $birthDate
     * @param string $biography
     */
    public function __construct(
        string $id,
        string $fullName,
        \DateTime $birthDate,
        string $biography
    ) {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->birthDate = $birthDate;
        $this->biography = $biography;
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
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate(): \DateTime
    {
        return $this->birthDate;
    }

    /**
     * @return string
     */
    public function getBiography(): string
    {
        return $this->biography;
    }

}