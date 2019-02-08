<?php

namespace common\models;


use yii\base\Model;
use common\components\validators\PhoneValidator;
use common\components\validators\ColorValidator;

class SettingsJson extends Model implements \JsonSerializable
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
            [['phone', 'color'], 'trim'],
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