<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PenelitianDosen;

/**
 * PenelitianDosenSearch represents the model behind the search form of `app\models\PenelitianDosen`.
 */
class PenelitianDosenSearch extends PenelitianDosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dosen_id', 'bidang_ilmu_id'], 'integer'],
            [['judul', 'mulai', 'akhir', 'tahun_ajaran', 'tim_riset'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = PenelitianDosen::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dosen_id' => $this->dosen_id,
            'mulai' => $this->mulai,
            'akhir' => $this->akhir,
            'bidang_ilmu_id' => $this->bidang_ilmu_id,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'tahun_ajaran', $this->tahun_ajaran])
            ->andFilterWhere(['like', 'tim_riset', $this->tim_riset]);

        return $dataProvider;
    }
}
