<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kabupaten;

/**
 * KabupatenSearch represents the model behind the search form about `app\models\Kabupaten`.
 */
class KabupatenSearch extends Kabupaten
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_kabupaten', 'nama_kabupaten', 'kode_provinsi'], 'safe'],
            [['is_kota'], 'integer'],
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
        $query = Kabupaten::find();

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
            'is_kota' => $this->is_kota,
        ]);

        $query->andFilterWhere(['like', 'kode_kabupaten', $this->kode_kabupaten])
            ->andFilterWhere(['like', 'nama_kabupaten', $this->nama_kabupaten])
            ->andFilterWhere(['like', 'kode_provinsi', $this->kode_provinsi]);

        return $dataProvider;
    }
}
