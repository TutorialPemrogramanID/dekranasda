<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Anggota;

/**
 * AnggotaSearch represents the model behind the search form about `app\models\Anggota`.
 */
class AnggotaSearch extends Anggota
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_tlp','id_provinsi','id_kota','id_kecamatan'], 'integer'],
            [['nama', 'email', 'no_ktp', 'alamat', 'wilayah', 'image','logo','jenis_pendaftaran','bahan_baku'], 'safe'],
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
        $query = Anggota::find();

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
            'no_tlp' => $this->no_tlp,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'wilayah', $this->wilayah])
            ->andFilterWhere(['like', 'image', $this->image]);
            ->andFilterWhere(['like', 'logo', $this->logo]);
            ->andFilterWhere(['like', 'jenis_pendaftaran', $this->jenis_pendaftaran]);
            ->andFilterWhere(['like', 'bahan_baku', $this->bahan_baku]);
            ->andFilterWhere(['like', 'id_provinsi', $this->id_provinsi]);
            ->andFilterWhere(['like', 'id_kota', $this->id_kota]);
            ->andFilterWhere(['like', 'id_kecamatan', $this->id_kecamatan]);

        return $dataProvider;
    }
}
