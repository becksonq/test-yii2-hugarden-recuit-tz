<?php

namespace common\models;


use yii\base\Model;
use common\validators\PhoneValidator;
use common\validators\ColorValidator;

class SettingsJson extends Model
{
    /**
     * @var string
     */
    public $color = "#00FF00";

    /**
     * @var null
     */
    public $phone = null;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['phone', PhoneValidator::class],
            ['color', ColorValidator::class],
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}