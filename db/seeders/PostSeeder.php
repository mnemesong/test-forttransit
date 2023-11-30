<?php

namespace db\seeders;

use db\records\PostAR;
use yii\db\ActiveRecordInterface;

class PostSeeder extends AbstractSeeder
{
    const I_HAD_LOVED_YOU_ID = '6df5e93f-7b8b-4808-b070-8c33f30a11ed';
    const RUSLAN_AND_LUDMILA_ID = 'f2e9bb64-b478-45ab-9916-616b614ba870';
    const IS_YOU_CAN_ID = 'df84556b-b545-4349-9a35-813e2038e234';
    const TAKE_THIS_ID = 'ab57010a-50cc-43d4-9ee9-3908eaa68488';
    const MAROON_ID = '7bc7c89a-46b9-4191-8b09-d824d38d8f4c';
    const WAR_AND_PEACE_ID = '332a446c-4736-4df9-8d56-04b1a672561f';
    const WORD_AND_DEAL_ID = 'd370bcd5-120e-4e26-ae08-886c5725b278';

    public function data(): array
    {
        $ds = DIRECTORY_SEPARATOR;
        return [
            [
                'id' => self::I_HAD_LOVED_YOU_ID,
                'title' => 'Я вас любил: любовь еще, быть может…',
                'imgPath' => \Yii::$app->imgPathService->getPostImgsPath()
                    . $ds . 'pushkin_default.jpg',
                'announce' => '«Я вас любил…» — стихотворение Александра '
                    . 'Сергеевича Пушкина, написанное в 1829 году и представляющее '
                    . 'собой лирическую миниатюру, созданную, по мнению '
                    . 'исследователей, как отклик на реальные события в жизни поэта. ',
                'text' => 'Я вас любил: любовь еще, быть может,'
                    . '<br>В душе моей угасла не совсем;'
                    . '<br>Но пусть она вас больше не тревожит;'
                    . '<br>Я не хочу печалить вас ничем.'
                    . '<br>Я вас любил безмолвно, безнадежно,'
                    . '<br>То робостью, то ревностью томим;'
                    . '<br>Я вас любил так искренно, так нежно,'
                    . '<br>Как дай вам Бог любимой быть другим.',
                'authorId' => AuthorSeeder::PUSHKIN_ID,
            ],
            [
                'id' => self::RUSLAN_AND_LUDMILA_ID,
                'title' => 'Руслан и Людмила',
                'imgPath' => \Yii::$app->imgPathService->getPostImgsPath()
                    . $ds . 'pushkin_default.jpg',
                'announce' => '«Русла́н и Людми́ла» — первая законченная поэма '
                    . 'Александра Сергеевича Пушкина; стихотворная волшебная '
                    . 'сказка, вдохновлённая древнерусскими былинами.',
                'text' => 'Князь Владимир-солнце пирует в гриднице с сыновьями и '
                    . 'толпой друзей, празднуя свадьбу младшей дочери Людмилы '
                    . 'с князем Русланом. В честь новобрачных поёт гусляр Баян. '
                    . 'Лишь трое гостей не радуются счастью Руслана и Людмилы, '
                    . 'три витязя не слушают вещего певца. Это три соперника '
                    . 'Руслана: витязь Рогдай, хвастун Фарлаф и хазарский хан '
                    . 'Ратмир.<br><br>Пир кончен, и все расходятся. Князь '
                    . 'благословляет молодых, их отводят в опочивальню, и счастливый '
                    . 'жених уже предвкушает любовные восторги. Вдруг грянул '
                    . 'гром, блеснул свет, все смерклось, и в наступившей тишине '
                    . 'раздался странный голос и кто-то взвился и исчез в темноте. '
                    . 'Очнувшийся Руслан ищет Людмилу, но её нет, она «похищена '
                    . 'безвестной силой».',
                'authorId' => AuthorSeeder::PUSHKIN_ID,
            ],
            [
                'id' => self::IS_YOU_CAN_ID,
                'title' => 'А вы могли бы?',
                'imgPath' => \Yii::$app->imgPathService->getPostImgsPath()
                    . $ds . 'mayakovsky_default.jpg',
                'announce' => '«А вы могли бы?» — стихотворение русского и '
                    . 'советского поэта Владимира Маяковского, написанное '
                    . 'в 1913 году.',
                'text' => 'Я сразу смазал карту будня,'
                    . '<br>плеснувши краску из стакана;'
                    . '<br>я показал на блюде студня'
                    . '<br>косые скулы океана.'
                    . '<br>На чешуе жестяной рыбы'
                    . '<br>прочёл я зовы новых губ.'
                    . '<br>А вы'
                    . '<br>ноктюрн сыграть'
                    . '<br>могли бы'
                    . '<br>на флейте водосточных труб?',
                'authorId' => AuthorSeeder::MAYAKOVSKY_ID,
            ],
            [
                'id' => self::TAKE_THIS_ID,
                'title' => 'Нате!',
                'imgPath' => \Yii::$app->imgPathService->getPostImgsPath()
                    . $ds . 'mayakovsky_default.jpg',
                'announce' => '«Нате!» — стихотворение русского советского поэта '
                    . 'Владимира Маяковского, написанное в 1913 году.',
                'text' => 'Через час отсюда в чистый переулок'
                    . '<br>вытечет по человеку ваш обрюзгший жир,'
                    . '<br>а я вам открыл столько стихов шкатулок,'
                    . '<br>я — бесценных слов мот и транжир.'
                    . '<br>Вот вы, мужчина, у вас в усах капуста'
                    . '<br>Где-то недокушанных, недоеденных щей;'
                    . '<br>вот вы, женщина, на вас белила густо,'
                    . '<br>вы смотрите устрицей из раковин вещей.'
                    . '<br>Все вы на бабочку поэтиного сердца'
                    . '<br>взгромоздитесь, грязные, в калошах и без калош.'
                    . '<br>Толпа озвереет, будет тереться,'
                    . '<br>ощетинит ножки стоглавая вошь.'
                    . '<br>А если сегодня мне, грубому гунну,'
                    . '<br>кривляться перед вами не захочется — и вот'
                    . '<br>я захохочу и радостно плюну,'
                    . '<br>плюну в лицо вам'
                    . '<br>я — бесценных слов транжир и мот.',
                'authorId' => AuthorSeeder::MAYAKOVSKY_ID,
            ],
            [
                'id' => self::MAROON_ID,
                'title' => 'Дурень',
                'imgPath' => \Yii::$app->imgPathService->getPostImgsPath()
                    . $ds . 'tolstoy_default.jpg',
                'announce' => 'Задумал дурень. На Русь гуляти, '
                    . 'Людей видати, Себя казати...',
                'text' => 'Задумал дурень'
                    . '<br>На Русь гуляти,'
                    . '<br>Людей видати,'
                    . '<br>Себя казати.'
                    . '<br>Увидел дурень'
                    . '<br>Две избы пусты;'
                    . '<br>Глянул в подполье:'
                    . '<br>В подполье черти,'
                    . '<br>Востроголовы,'
                    . '<br>Глаза, что ложки,'
                    . '<br>Усы, что вилы,'
                    . '<br>Руки, что грабли,'
                    . '<br>В карты играют,'
                    . '<br>Костью бросают,'
                    . '<br>Деньги считают.'
                    . '<br>Дурень им молвил:'
                    . '<br>«Бог да на помочь'
                    . '<br>Вам, добрым людям».',
                'authorId' => AuthorSeeder::TOLSTOY_ID,
            ],
            [
                'id' => self::WAR_AND_PEACE_ID,
                'title' => 'Война и мир',
                'imgPath' => \Yii::$app->imgPathService->getPostImgsPath()
                    . $ds . 'tolstoy_default.jpg',
                'announce' => '«Война́ и мир» — роман-эпопея Льва Николаевича '
                    . 'Толстого, описывающий русское общество в эпоху войн против '
                    . 'Наполеона в 1805—1812 годах. Эпилог романа доводит '
                    . 'повествование до 1820 года.',
                'text' => ' Друзья князь и граф искали смысл жизни, когда '
                    . 'началась война 1812 года. Князь умер от полученного при '
                    . 'Бородино ранения, помирившись с невестой. Граф выжил и '
                    . 'обрёл семейное счастье с невестой князя.',
                'authorId' => AuthorSeeder::TOLSTOY_ID,
            ],
            [
                'id' => self::WORD_AND_DEAL_ID,
                'title' => 'Слово и дело',
                'imgPath' => \Yii::$app->imgPathService->getPostImgsPath()
                    . $ds . 'pikul_default.jpg',
                'announce' => '«Слово и дело» — исторический роман Валентина Пикуля, '
                    . 'посвященный периоду царствования императрицы Анны Иоанновны. '
                    . 'Написан в 1961-71 гг., опубликован в 1974-75 гг.',
                'text' => 'Книга 1. Царица престрашного зраку<br>'
                    . 'Первая книга, охватывает события недолгого правления '
                    . 'Петра II, попытки русского дворянства после смерти Петра II '
                    . 'ограничить власть монархии в стране, сочинение так '
                    . 'называемых «кондиций», условий, которые должна была '
                    . 'соблюдать Анна Иоанновна при восхождении на престол. '
                    . 'Эти «кондиции» очень ограничивали бы власть императрицы. '
                    . 'При помощи Остермана ей удается обмануть авторов данного '
                    . 'проекта и по восхождении на престол учинить над ними '
                    . 'жестокую расправу. Заканчивается книга возвышением '
                    . 'Волынского при дворе.'
                    . '<br><br>Книга 2. Мои любезные конфиденты'
                    . '<br>Вторая книга, отображает события неудачного турецкого '
                    . 'похода фельдмаршала Миниха, дело Волынского, смерть '
                    . 'Анны Иоанновны, короткий период регентства Бирона и конец '
                    . 'бироновщины, правление Анны Леопольдовны и, наконец, '
                    . 'переворот, совершенный Елизаветой Петровной.',
                'authorId' => AuthorSeeder::PIKUL_ID,
            ],
        ];
    }

    public function getNewAr(array $values): ActiveRecordInterface
    {
        return new PostAR($values);
    }
}