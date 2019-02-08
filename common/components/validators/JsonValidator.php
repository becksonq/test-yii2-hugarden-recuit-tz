<?php

namespace common\components\validators;


use yii\validators\Validator;

class JsonValidator extends Validator
{
    public $model;

    /**
     * @param \yii\base\Model $model
     * @param string $attribute
     */
    public function validateAttribute($model, $attribute)
    {
        $account = $model;

        /** @var $model \common\models\SettingsJson */
        $model = new $this->model;
        $model->attributes = $account->settings->jsonSerialize();

        if (!$model->validate()) {

            foreach ($model->attributes() as $val) :
                if (isset($model->getErrors()[$val])) {
                    $this->addError($account, $attribute,
                        'Ошибка валидации ' . $attribute . ' параметра {' . $val . '}.',
                        [$val => $model->getErrors()[$val][0]]);
                }
            endforeach;
        }
    }
}