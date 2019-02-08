<?php

namespace common\components\validators;


use yii\validators\Validator;

class ColorValidator extends Validator
{
    /**
     * @param \yii\base\Model $model
     * @param string $attribute
     */
    public function validateAttribute($model, $attribute)
    {
        $pattern = '/^#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?$/i';

        if (!preg_match($pattern, $model->$attribute)) {
            $this->addError($model, $attribute,
                "color - '" . $model->$attribute . "' не является цветом");
        }
    }
}