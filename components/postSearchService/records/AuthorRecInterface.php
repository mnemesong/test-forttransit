<?php

namespace components\postSearchService\records;

interface AuthorRecInterface
{
    public function getId(): string;

    public function getFullName(): string;

    public function getBirthDate(): \DateTime;

    public function getBiography(): string;

}