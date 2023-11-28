<?php

use yii\db\Migration;
use db\records\AuthorAR;

/**
 * Handles the creation of table `{{%authors}}`.
 */
class m231128_165436_create_authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(AuthorAR::tableName(), [
            'id' => $this->string(128)->unique()->notNull(),
            'fullName' => $this->string(255)->defaultValue(''),
            'birthDate' => $this->date()->notNull(),
            'biography' => $this->text(),
        ]);
        $this->addPrimaryKey(
            'authors_pk',
            AuthorAR::tableName(),
            ['id']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(AuthorAR::tableName());
    }
}
