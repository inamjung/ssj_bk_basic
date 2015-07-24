<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $pid
 * @property string $name
 * @property string $birth
 * @property string $hn
 * @property string $an
 * @property string $cid
 * @property string $hospcode
 * @property string $date_addmit
 * @property string $date_discharge
 * @property string $ward
 * @property string $pdx
 * @property string $discharge_type
 * @property integer $admit_day
 * @property string $address
 * @property string $village
 * @property string $tambon
 * @property string $amphur
 * @property string $province
 * @property string $d_update
 * @property string $note1
 * @property string $note2
 * @property string $note3
 * @property string $note4
 * @property string $sex
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birth', 'date_addmit', 'date_discharge', 'd_update'], 'safe'],
            [['admit_day'], 'integer'],
            [['name', 'ward'], 'string', 'max' => 100],
            [['hn', 'an'], 'string', 'max' => 13],
            [['cid'], 'string', 'max' => 17],
            [['hospcode', 'sex'], 'string', 'max' => 5],
            [['pdx', 'tambon'], 'string', 'max' => 6],
            [['discharge_type', 'village', 'province'], 'string', 'max' => 2],
            [['address'], 'string', 'max' => 50],
            [['amphur'], 'string', 'max' => 4],
            [['note1', 'note2', 'note3', 'note4'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pid' => 'Pid',
            'name' => 'ชื่อ-สกุล',
            'birth' => 'วันเกิด',
            'hn' => 'Hn',
            'an' => 'An',
            'cid' => 'เลขที่บัตรประชาชน',
            'hospcode' => 'สถานพยาบาล',
            'date_addmit' => 'วันที่นอน',
            'date_discharge' => 'วันที่ออก',
            'ward' => 'Ward',
            'pdx' => 'Pdx',
            'discharge_type' => 'Discharge Type',
            'admit_day' => 'Admit Day',
            'address' => 'Address',
            'village' => 'Village',
            'tambon' => 'Tambon',
            'amphur' => 'Amphur',
            'province' => 'Province',
            'd_update' => 'D Update',
            'note1' => 'Note1',
            'note2' => 'Note2',
            'note3' => 'Note3',
            'note4' => 'Note4',
            'sex' => 'Sex',
        ];
    }
}
