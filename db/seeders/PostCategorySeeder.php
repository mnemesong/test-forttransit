<?php

namespace db\seeders;

use db\records\PostCategoryAR;
use yii\db\ActiveRecordInterface;

class PostCategorySeeder extends AbstractSeeder
{
    const PROSE_ID = '77577f93-4935-49f6-ae7e-7b1ba3c8e3de';
    const POETRY_ID = 'ba651857-a655-40c5-b1e9-db7dd90e5de6';
    const SHORT_POEM = 'd0334742-c5fa-4ff1-9580-cf892224e641';
    const LONG_POEM = 'd9d14ff3-9ab4-4e07-85dc-591a564701fb';
    const ROMAN_ID = '2aad851e-b6ac-4d44-ac9e-182d4ab001bd';

    public function data(): array
    {
        return [
            [
                'id' => self::PROSE_ID,
                'name' => 'Проза',
                'description' => 'Проза'
                    . ' — устная или письменная речь, без деления на соизмеримые отрезки '
                    . '— стихи; в противоположность поэзии её ритм опирается '
                    . 'на приблизительную соотнесенность синтаксических конструкций '
                    . '(периодов, предложений, колонов).'
            ],
            [
                'id' => self::POETRY_ID,
                'name' => 'Поэзия',
                'description' => 'Поэзия — особый способ организации речи; '
                    . 'привнесение в речь дополнительной меры, не определённой '
                    . 'потребностями обыденного языка; словесное художественное '
                    . 'творчество, преимущественно стихотворное.'
            ],
            [
                'id' => self::SHORT_POEM,
                'name' => 'Стих',
                'description' => 'Стих, стиховедческий термин, используемый '
                    . 'в нескольких значениях: художественная речь, '
                    . 'организованная делением на ритмически соизмеримые отрезки; '
                    . 'поэзия в узком смысле;'
            ],
            [
                'id' => self::ROMAN_ID,
                'name' => 'Роман',
                'description' => 'Роман — это литературный жанр, чаще прозаический, '
                    . 'зародившийся в Средние века у романских народов как рассказ '
                    . 'на народном языке и ныне превратившийся в самый распространенный '
                    . 'вид эпической литературы, изображающий жизнь персонажа с её '
                    . 'волнующими страстями, борьбой, социальными противоречиями '
                    . 'и стремлениями к идеалу. '
            ],
            [
                'id' => self::LONG_POEM,
                'name' => 'Поэма',
                'description' => 'Крупное или среднее по объёму многочастное '
                    . 'стихотворное произведение, как правило, лиро-эпического '
                    . 'характера, принадлежащее определённому автору, имеет '
                    . 'большую стихотворную повествовательную форму.'
            ],
        ];
    }

    public function getNewAr(array $values): ActiveRecordInterface
    {
        return new PostCategoryAR($values);
    }
}