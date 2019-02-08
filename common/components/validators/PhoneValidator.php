<?php

namespace common\components\validators;


use yii\validators\Validator;

class PhoneValidator extends Validator
{
    /**
     * @param \yii\base\Model $model
     * @param string $attribute
     */
    public function validateAttribute($model, $attribute)
    {
        if (!preg_match('/^[+()0-9]{1,20}$/i', $model->$attribute)) {
            $this->addError($model, $attribute, 'Error');
        }
    }
}