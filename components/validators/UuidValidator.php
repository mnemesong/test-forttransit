<?php

namespace components\validators;

use Ramsey\Uuid\Uuid;
use yii\validators\Validator;

class UuidValidator extends Validator
{
    public $skipOnEmpty = false;
    public $message = "Invalid uuid";
//
//    public function validateAttribute($model, $attribute)
//    {
//        parent::validateAttribute($model, $attribute);
//        if(!Uuid::isValid($model->$attribute)) {
//            $model->addError($attribute, $this->message);
//        }
//    }

    public function validateValue($value)
    {
        return Uuid::isValid($value)
            ? null
            : [$this->message, []];
    }
}