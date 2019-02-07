<?php

namespace common\models;

use Yii;
use common\models\SettingsJson;
use common\validators\JsonValidator;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property array $settings
 * @property array $options
 */
class Account extends TrickyModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%account}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['settings', 'options'], 'safe'],
            [['email', 'password'], 'string', 'max' => 255],
            ['email', 'email'],
            ['settings', JsonValidator::class, 'model' => SettingsJson::class],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'       => Yii::t('common', 'ID'),
            'email'    => Yii::t('common', 'Email'),
            'password' => Yii::t('common', 'Password'),
            'settings' => Yii::t('common', 'Settings'),
            'options'  => Yii::t('common', 'Options'),
        ];
    }
}
