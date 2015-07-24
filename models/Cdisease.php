<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cdisease".
 *
 * @property string $diseasecode
 * @property string $disease
 * @property string $diseasethai
 * @property string $code504
 * @property string $code506
 * @property string $codechronic
 * @property string $diagcode
 * @property string $code298
 * @property string $code505
 * @property string $codemental
 * @property string $codedental
 * @property string $code19
 * @property string $codeca
 */
class Cdisease extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdisease';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diseasecode'], 'required'],
            [['diseasecode', 'diagcode'], 'string', 'max' => 7],
            [['disease', 'diseasethai'], 'string', 'max' => 255],
            [['code504', 'code506', 'code505', 'codemental', 'codedental', 'code19', 'codeca'], 'string', 'max' => 2],
            [['codechronic'], 'string', 'max' => 4],
            [['code298'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diseasecode' => 'Diseasecode',
            'disease' => 'Disease',
            'diseasethai' => 'Diseasethai',
            'code504' => 'Code504',
            'code506' => 'Code506',
            'codechronic' => 'Codechronic',
            'diagcode' => 'Diagcode',
            'code298' => 'Code298',
            'code505' => 'Code505',
            'codemental' => 'Codemental',
            'codedental' => 'Codedental',
            'code19' => 'Code19',
            'codeca' => 'Codeca',
        ];
    }
}
