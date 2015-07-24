<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `app\models\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'admit_day'], 'integer'],
            [['name', 'birth', 'hn', 'an', 'cid', 'hospcode', 'date_addmit', 'date_discharge', 'ward', 'pdx', 'discharge_type', 'address', 'village', 'tambon', 'amphur', 'province', 'd_update', 'note1', 'note2', 'note3', 'note4', 'sex'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Patient::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            
            'sort'=>[                
                'defaultOrder'=>[
                    'pid'=>'SORT_DESC',
                ]
            ]
            
        ]);
        
        

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pid' => $this->pid,
            'birth' => $this->birth,
            'date_addmit' => $this->date_addmit,
            'date_discharge' => $this->date_discharge,
            'admit_day' => $this->admit_day,
            'd_update' => $this->d_update,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'ward', $this->ward])
            ->andFilterWhere(['like', 'pdx', $this->pdx])
            ->andFilterWhere(['like', 'discharge_type', $this->discharge_type])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'village', $this->village])
            ->andFilterWhere(['like', 'tambon', $this->tambon])
            ->andFilterWhere(['like', 'amphur', $this->amphur])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'note1', $this->note1])
            ->andFilterWhere(['like', 'note2', $this->note2])
            ->andFilterWhere(['like', 'note3', $this->note3])
            ->andFilterWhere(['like', 'note4', $this->note4])
            ->andFilterWhere(['like', 'sex', $this->sex]);

        return $dataProvider;
    }
}
