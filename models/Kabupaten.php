<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property string $kode_kabupaten
 * @property string $nama_kabupaten
 * @property string $kode_provinsi
 * @property integer $is_kota
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_kabupaten', 'nama_kabupaten', 'kode_provinsi'], 'required'],
            [['is_kota'], 'integer'],
            [['kode_kabupaten'], 'string', 'max' => 5],
            [['nama_kabupaten'], 'string', 'max' => 225],
            [['kode_provinsi'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_kabupaten' => 'Kode Kabupaten',
            'nama_kabupaten' => 'Nama Kabupaten',
            'kode_provinsi' => 'Kode Provinsi',
            'is_kota' => 'Is Kota',
        ];
    }

      public function getKodeProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['kode_provinsi' => 'kode_provinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatans()
    {
        return $this->hasMany(Kecamatan::className(), ['kode_kabupaten' => 'kode_kabupaten']);
    }
}
