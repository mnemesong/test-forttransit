<?php

namespace db\seeders;

use db\records\AuthorAR;
use Pantagruel74\Yii2Seeder\Seeder;
use yii\db\ActiveRecordInterface;

class AuthorSeeder extends Seeder
{
    const TOLSTOY_ID = '4a53c7c1-6a11-46d1-b934-30f007c99d1a';
    const PUSHKIN_ID = '327b7325-daa9-4429-9df0-5ac244c76f6a';
    const PIKUL_ID = 'f3c131d7-97ca-4a2a-b809-a34073d6e42e';
    const MAYAKOVSKY_ID = '74778a0c-762b-42cb-b006-a1076a65ad39';

    public function data(): array
    {
        return [
            [
                'id' => self::TOLSTOY_ID,
                'fullName' => 'Лев Николаевич Толстой',
                'birthDate' => '1828-09-09',
                'biography' => 'Граф Лев Николаевич Толстой (28 августа 1828, '
                    . 'Ясная Поляна, Тульская губерния, Российская империя — '
                    . '7 [20] ноября 1910, станция Астапово, Рязанская губерния, '
                    . 'Российская империя) — один из наиболее известных русских '
                    . 'писателей и мыслителей, один из величайших в мире '
                    . 'писателей-романистов[4].<br><br>Участник обороны Севастополя. '
                    . 'Просветитель, публицист, религиозный мыслитель, '
                    . 'его авторитетное мнение послужило причиной возникновения '
                    . 'нового религиозно-нравственного течения — толстовства. '
                    . 'За свои взгляды был отлучён от РПЦ. Член-корреспондент '
                    . 'Императорской Академии наук (1873), почётный академик '
                    . 'по разряду изящной словесности (1900)[5]. Был номинирован '
                    . 'на Нобелевскую премию по литературе (1902, 1903, 1904, 1905). '
                    . 'Впоследствии отказался от дальнейших номинаций. '
                    . 'Классик мировой литературы.'
            ],
            [
                'id' => self::PUSHKIN_ID,
                'fullName' => 'Александр Сергеевич Пушкин',
                'birthDate' => '1799-05-26',
                'biography' => 'Александр Сергеевич Пушкин (26 мая 1799, '
                    . 'Москва — 29 января 1837, Санкт-Петербург) — '
                    . 'русский поэт, драматург и прозаик, заложивший основы '
                    . 'русского реалистического направления, литературный критик '
                    . 'и теоретик литературы, историк, публицист, журналист.'
                    . '<br><br>Один из самых авторитетных литературных деятелей '
                    . 'первой трети XIX века. Ещё при жизни Пушкина сложилась '
                    . 'его репутация величайшего национального русского поэта. '
                    . 'Пушкин рассматривается как основоположник современного '
                    . 'русского литературного языка.'
            ],
            [
                'id' => self::PIKUL_ID,
                'fullName' => 'Валентин Саввич Пикуль',
                'birthDate' => '1928-06-13',
                'biography' => 'Валентин Саввич Пикуль (13 июля 1928, Ленинград '
                    . '— 16 июля 1990, Рига) — русский советский писатель, автор '
                    . 'многочисленных художественных произведений на историческую '
                    . 'и военно-морскую тематику. Уже при жизни писателя общий '
                    . 'тираж его книг, исключая журналы и зарубежные издания, '
                    . 'составил примерно 20 млн экз., а на 2007 год в картотеке '
                    . 'автора числится более 500 библиографических единиц (изданий книг), '
                    . 'включая семь изданий собраний сочинений (четыре из них '
                    . '— 28-томники) суммарным тиражом полмиллиарда экземпляров.'
            ],
            [
                'id' => self::MAYAKOVSKY_ID,
                'fullName' => 'Владимир Владимирович Маяковский',
                'birthDate' => '1893-06-07',
                'biography' => 'Владимир Владимирович Маяковский (7 июля 1893, '
                    . 'Багдади, Кутаисская губерния, Российская империя — '
                    . '14 апреля 1930, Москва, СССР) — русский и советский поэт, '
                    . 'драматург, киносценарист, кинорежиссёр, киноактёр, художник. '
                    . 'Лауреат премии Ленинского комсомола (1968 — посмертно). '
                    . 'Один из наиболее значимых русских поэтов XX века, '
                    . 'классик советской литературы. Редактор журналов «ЛЕФ» '
                    . '(«Левый фронт») и «Новый ЛЕФ».'
            ],
        ];
    }

    public function getNewAr(array $values): ActiveRecordInterface
    {
        return new AuthorAR($values);
    }
}