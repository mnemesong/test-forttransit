<?php

namespace db\seeders;

use yii\base\Model;
use yii\db\ActiveRecordInterface;

abstract class AbstractSeeder extends Model
{
    public bool $verbal = false;

    /**
     * @return array
     */
    abstract public function data(): array;

    /**
     * @param array $values
     * @return ActiveRecordInterface
     */
    abstract public function getNewAr(array $values): ActiveRecordInterface;

    /**
     * @return int
     */
    public function run(): int
    {
        $result = 0;
        foreach ($this->data() as $parameters)
        {
            try {
                $newOne = $this->getNewAr($parameters);
                if ($newOne->save() === true) {
                    $result++;
                } else {
                    if($this->verbal === true) {
                        echo get_class($newOne) . " save error: " . implode(". ", $newOne->getFirstErrors());
                    }
                }
            } catch (\Exception $exception) {
                if($this->verbal === true) {
                    echo $exception;
                }
            }
        }
        return $result;
    }
}