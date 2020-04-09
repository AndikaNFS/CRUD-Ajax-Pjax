<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kegiatan;

/**
 * KegiatanSearch represents the model behind the search form of `app\models\Kegiatan`.
 */
class KegiatanSearch extends Kegiatan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jenis_kegiatan_id', 'dosen_id'], 'integer'],
            [['tanggal_mulai', 'tanggal_selesai', 'tempat', 'deskripsi', 'kepesertaan', 'nilai'], 'safe'],
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
        $query = Kegiatan::find();

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
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'jenis_kegiatan_id' => $this->jenis_kegiatan_id,
            'dosen_id' => $this->dosen_id,
        ]);

        $query->andFilterWhere(['like', 'tempat', $this->tempat])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'kepesertaan', $this->kepesertaan])
            ->andFilterWhere(['like', 'nilai', $this->nilai]);

        return $dataProvider;
    }
}
