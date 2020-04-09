<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dosen;

/**
 * DosenSearch represents the model behind the search form of `app\models\Dosen`.
 */
class DosenSearch extends Dosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'prodi_id'], 'integer'],
            [['nidn', 'nama', 'gelar_belakang', 'gelar_depan', 'jk', 'tmp_lahir', 'tgl_lahir', 'alamat', 'email', 'thn_masuk'], 'safe'],
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
        $query = Dosen::find();

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
            'tgl_lahir' => $this->tgl_lahir,
            'prodi_id' => $this->prodi_id,
        ]);

        $query->andFilterWhere(['like', 'nidn', $this->nidn])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'gelar_belakang', $this->gelar_belakang])
            ->andFilterWhere(['like', 'gelar_depan', $this->gelar_depan])
            ->andFilterWhere(['like', 'jk', $this->jk])
            ->andFilterWhere(['like', 'tmp_lahir', $this->tmp_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'thn_masuk', $this->thn_masuk]);

        return $dataProvider;
    }
}
