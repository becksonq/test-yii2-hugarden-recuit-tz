<?php

namespace common\models;

use Yii;
use common\components\validators\JsonValidator;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property SettingsJson $settings
 * @property array $options
 */
class Account extends TrickyModel
{
    /**
     * @var array
     */
    public $options;

    /**
     * @var SettingsJson
     */
    public $settings;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%account}}';
    }

    /**
     * Account constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->settings = new SettingsJson();
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert): bool
    {
        $this->settings = $this->settings->jsonSerialize();
        $this->setAttribute('options', $this->options);
        $this->setAttribute('settings', $this->settings);
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        parent::afterFind();

        $this->options = $this->getAttribute('options');

        $this->settings->color = $this->getAttribute('settings')['color'];
        $this->settings->phone = $this->getAttribute('settings')['phone'];
    }

    /**
     * @return mixed
     */
    public function getSettings()
    {
        return $this->getAttribute('settings');
    }

    public function setSettings()
    {
        $this->setAttribute('settings', new SettingsJson());
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->getAttribute('options');
    }

    /**
     * @param $value
     */
    public function setOptions($value)
    {
        $this->setAttribute('options', $value);
    }
}
