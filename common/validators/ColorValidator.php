<?php

namespace common\validators;


use yii\validators\Validator;

class ColorValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if (!in_array($model->$attribute, ['USA', 'Indonesia'])) {
            $this->addError($model, $attribute, 'Страна должна быть либо "{country1}" либо "{country2}".',
                ['country1' => 'USA', 'country2' => 'Indonesia']);
        }
    }
}