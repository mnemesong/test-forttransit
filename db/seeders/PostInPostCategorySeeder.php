<?php

namespace db\seeders;

use db\records\PostInPostCategoryAR;
use yii\db\ActiveRecordInterface;

class PostInPostCategorySeeder extends AbstractSeeder
{

    public function data(): array
    {
        return [
            [
                'postId' => PostSeeder::I_HAD_LOVED_YOU_ID,
                'postCategoryId' => PostCategorySeeder::POETRY_ID,
            ],
            [
                'postId' => PostSeeder::I_HAD_LOVED_YOU_ID,
                'postCategoryId' => PostCategorySeeder::SHORT_POEM,
            ],
            [
                'postId' => PostSeeder::RUSLAN_AND_LUDMILA_ID,
                'postCategoryId' => PostCategorySeeder::POETRY_ID,
            ],
            [
                'postId' => PostSeeder::RUSLAN_AND_LUDMILA_ID,
                'postCategoryId' => PostCategorySeeder::LONG_POEM,
            ],
            [
                'postId' => PostSeeder::IS_YOU_CAN_ID,
                'postCategoryId' => PostCategorySeeder::POETRY_ID,
            ],
            [
                'postId' => PostSeeder::IS_YOU_CAN_ID,
                'postCategoryId' => PostCategorySeeder::SHORT_POEM,
            ],
            [
                'postId' => PostSeeder::TAKE_THIS_ID,
                'postCategoryId' => PostCategorySeeder::POETRY_ID,
            ],
            [
                'postId' => PostSeeder::TAKE_THIS_ID,
                'postCategoryId' => PostCategorySeeder::SHORT_POEM,
            ],
            [
                'postId' => PostSeeder::MAROON_ID,
                'postCategoryId' => PostCategorySeeder::POETRY_ID,
            ],
            [
                'postId' => PostSeeder::MAROON_ID,
                'postCategoryId' => PostCategorySeeder::SHORT_POEM,
            ],
            [
                'postId' => PostSeeder::WAR_AND_PEACE_ID,
                'postCategoryId' => PostCategorySeeder::PROSE_ID,
            ],
            [
                'postId' => PostSeeder::WAR_AND_PEACE_ID,
                'postCategoryId' => PostCategorySeeder::ROMAN_ID,
            ],
            [
                'postId' => PostSeeder::WORD_AND_DEAL_ID,
                'postCategoryId' => PostCategorySeeder::PROSE_ID,
            ],
            [
                'postId' => PostSeeder::WORD_AND_DEAL_ID,
                'postCategoryId' => PostCategorySeeder::ROMAN_ID,
            ],
        ];
    }

    public function getNewAr(array $values): ActiveRecordInterface
    {
        return new PostInPostCategoryAR($values);
    }
}