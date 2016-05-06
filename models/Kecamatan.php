<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property string $kode_kecamatan
 * @property string $nama_kecamatan
 * @property string $kode_kabupaten
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_kecamatan', 'nama_kecamatan'], 'required'],
            [['kode_kecamatan'], 'string', 'max' => 8],
            [['nama_kecamatan'], 'string', 'max' => 225],
            [['kode_kabupaten'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_kecamatan' => 'Kode Kecamatan',
            'nama_kecamatan' => 'Nama Kecamatan',
            'kode_kabupaten' => 'Kode Kabupaten',
        ];
    }

     public function getKodeKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['kode_kabupaten' => 'kode_kabupaten']);
    }
}
