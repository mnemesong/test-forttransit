<?php

namespace Pantagruel74\TestUnit\postSearchService;

use components\postSearchService\PostSearchService;
use components\postSearchService\records\AuthorRecInterface;
use components\postSearchService\records\PostCategoryRecInterface;
use components\postSearchService\records\PostRecInterface;
use components\postSearchService\request\PostReqDto;
use components\postSearchService\response\PostRespDto;
use Pantagruel74\TestUnit\postSearchService\stubs\mangers\PostManagerStub;
use Pantagruel74\TestUnit\postSearchService\stubs\records\AuthorRecStub;
use Pantagruel74\TestUnit\postSearchService\stubs\records\PostCategoryRecStub;
use Pantagruel74\TestUnit\postSearchService\stubs\records\PostRecStub;
use PHPUnit\Framework\TestCase;

class PostSearchServiceTest extends TestCase
{
    const AUTHOR_TOLSTOY_ID = '49a193d3-fdad-4b89-8f7f-f7c274987763';
    const AUTHOR_PUSHKIN_ID = '1a251ee7-8550-4951-8cdf-7136ec54f66f';
    const CATEGORY_ROMANE_ID = '66bbcfac-e8c4-4687-aa78-38295348e2c4';
    const CATEGORY_POEM_ID = 'd557c8f0-eb29-441d-bba1-9fccd58fde98';
    const CATEGORY_PROSE_ID = '285c773d-1c47-46fd-a8bb-43d65fca9c7d';
    const CATEGORY_STORY_ID = '3b3b4daf-af16-4368-914a-b698418c3d21';

    protected static function getAuthorTolstoy(): AuthorRecInterface
    {
        return new AuthorRecStub(
            self::AUTHOR_TOLSTOY_ID,
            'Лев Николаевич Толстой',
            new \DateTime('1828-09-09'),
            'Лев Николаевич Толстой биография'
        );
    }

    protected static function getAuthorPushkin(): AuthorRecInterface
    {
        return new AuthorRecStub(
            self::AUTHOR_PUSHKIN_ID,
            'Александр Сергеевич Пушкин',
            new \DateTime('1799-06-06'),
            'Александр Сергеевич Пушкин биография',
        );
    }

    protected static function getCategoryRomane(): PostCategoryRecInterface
    {
        return new PostCategoryRecStub(
            self::CATEGORY_ROMANE_ID,
            'Роман',
            'Роман описание'
        );
    }

    protected static function getCategoryPoem(): PostCategoryRecInterface
    {
        return new PostCategoryRecStub(
            self::CATEGORY_POEM_ID,
            'Поэма',
            'Поэма описание',
        );
    }

    protected static function getCategoryProse(): PostCategoryRecInterface
    {
        return new PostCategoryRecStub(
            self::CATEGORY_PROSE_ID,
            'Проза',
            'Проза описание',
        );
    }

    protected static function getCategoryStory(): PostCategoryRecInterface
    {
        return new PostCategoryRecStub(
            self::CATEGORY_STORY_ID,
            'Повесть',
            'Повесть описание',
        );
    }

    protected static function getPostWarAndPeace(): PostRecInterface
    {
        return new PostRecStub(
            '556dffca-0186-4df8-baab-01178807ad08',
            'Война и мир',
            'war_and_peace_img.png',
            'Война и мир аннонс',
            'Война и мир текст',
            self::getAuthorTolstoy(),
            [
                self::getCategoryRomane(),
                self::getCategoryProse()
            ]
        );
    }

    protected static function getPostPikeLady(): PostRecInterface
    {
        return new PostRecStub(
            '4c147a8c-f722-47c1-ab4d-18b3d5d7a3ef',
            'Пиковая дама',
            'pike_lady.png',
            'Пиковая дама аннонс',
            'Пиковая дама текст',
            self::getAuthorPushkin(),
            [
                self::getCategoryStory(),
                self::getCategoryProse()
            ]
        );
    }

    protected static function getPostRuslanAndLudmila(): PostRecInterface
    {
        return new PostRecStub(
            '992e7ce6-11f6-4c84-ab00-27959a1b32a1',
            'Руслан и Людмила',
            'ruslan.png',
            'Руслан и Людмила аннонс',
            'Руслан и Людмила текст',
            self::getAuthorPushkin(),
            [
                self::getCategoryPoem()
            ]
        );
    }

    /* @return PostRecInterface[] */
    protected static function getAllPosts(): array
    {
        return [
            self::getPostWarAndPeace(),
            self::getPostPikeLady(),
            self::getPostRuslanAndLudmila(),
        ];
    }

    public function testSubstringNameSearch1(): void
    {
        $givenMngr = new PostManagerStub(self::getAllPosts());
        $givenServ = new PostSearchService($givenMngr);
        $givenReq = new PostReqDto(
            'ми',
            null,
            null
        );
        $result = $givenServ->searchPosts($givenReq);
        $nominal = new PostRespDto([
            self::getPostWarAndPeace(),
            self::getPostRuslanAndLudmila()
        ]);
        $this->assertEquals(
            $nominal,
            $result
        );
    }

    public function testSubstringNameSearch2(): void
    {
        $givenMngr = new PostManagerStub(self::getAllPosts());
        $givenServ = new PostSearchService($givenMngr);
        $givenReq = new PostReqDto(
            'Пиковая дама',
            null,
            null
        );
        $result = $givenServ->searchPosts($givenReq);
        $nominal = new PostRespDto([
            self::getPostPikeLady()
        ]);
        $this->assertEquals(
            $nominal,
            $result
        );
    }

    public function testSubstringNameSearchEmpty(): void
    {
        $givenMngr = new PostManagerStub(self::getAllPosts());
        $givenServ = new PostSearchService($givenMngr);
        $givenReq1 = new PostReqDto(
            '',
            null,
            null
        );
        $result1 = $givenServ->searchPosts($givenReq1);
        $givenReq2 = new PostReqDto(
            null,
            null,
            null
        );
        $result2 = $givenServ->searchPosts($givenReq2);
        $nominal = new PostRespDto(self::getAllPosts());
        $this->assertEquals(
            $nominal,
            $result1
        );
        $this->assertEquals(
            $nominal,
            $result2
        );
    }

    public function testStringCategorySearchValid(): void
    {
        $givenMngr = new PostManagerStub(self::getAllPosts());
        $givenServ = new PostSearchService($givenMngr);
        $givenReq = new PostReqDto(
            null,
            self::CATEGORY_PROSE_ID,
            null
        );
        $result = $givenServ->searchPosts($givenReq);
        $nominal = new PostRespDto([
            self::getPostWarAndPeace(),
            self::getPostPikeLady()
        ]);
        $this->assertEquals(
            $nominal,
            $result
        );
    }

    public function testStringCategorySearchInvalid(): void
    {
        $givenMngr = new PostManagerStub(self::getAllPosts());
        $givenServ = new PostSearchService($givenMngr);
        $givenReq = new PostReqDto(
            null,
            'dabsfbyabs9fbn9123',//invalid category id
            null
        );
        $result = $givenServ->searchPosts($givenReq);
        $nominal = new PostRespDto([]);
        $this->assertEquals(
            $nominal,
            $result
        );
    }

    public function testStringAuthorSearchValid(): void
    {
        $givenMngr = new PostManagerStub(self::getAllPosts());
        $givenServ = new PostSearchService($givenMngr);
        $givenReq = new PostReqDto(
            null,
            null,
            self::AUTHOR_PUSHKIN_ID
        );
        $result = $givenServ->searchPosts($givenReq);
        $nominal = new PostRespDto([
            self::getPostPikeLady(),
            self::getPostRuslanAndLudmila()
        ]);
        $this->assertEquals(
            $nominal,
            $result
        );
    }

    public function testStringAuthorSearchInvalid(): void
    {
        $givenMngr = new PostManagerStub(self::getAllPosts());
        $givenServ = new PostSearchService($givenMngr);
        $givenReq = new PostReqDto(
            null,
            null,//invalid category id
            'dabsfbyabs9fbn9123'
        );
        $result = $givenServ->searchPosts($givenReq);
        $nominal = new PostRespDto([]);
        $this->assertEquals(
            $nominal,
            $result
        );
    }

    public function testPagination1(): void
    {
        $givenMngr = new PostManagerStub(self::getAllPosts());
        $givenServ = new PostSearchService($givenMngr);
        $givenReq = new PostReqDto(
            null,
            null,//invalid category id
            null,
            0,
            2
        );
        $result = $givenServ->searchPosts($givenReq);
        $nominal = new PostRespDto([
            self::getPostWarAndPeace(),
            self::getPostPikeLady(),
        ]);
        $this->assertEquals(
            $nominal,
            $result
        );
    }

    public function testPagination2(): void
    {
        $givenMngr = new PostManagerStub(self::getAllPosts());
        $givenServ = new PostSearchService($givenMngr);
        $givenReq = new PostReqDto(
            null,
            null,//invalid category id
            null,
            1,
            2
        );
        $result = $givenServ->searchPosts($givenReq);
        $nominal = new PostRespDto([
            self::getPostRuslanAndLudmila()
        ]);
        $this->assertEquals(
            $nominal,
            $result
        );
    }
    public function testPagination3(): void
    {
        $givenMngr = new PostManagerStub(self::getAllPosts());
        $givenServ = new PostSearchService($givenMngr);
        $givenReq = new PostReqDto(
            null,
            null,//invalid category id
            null,
            2,
            2
        );
        $result = $givenServ->searchPosts($givenReq);
        $nominal = new PostRespDto([
        ]);
        $this->assertEquals(
            $nominal,
            $result
        );
    }
}