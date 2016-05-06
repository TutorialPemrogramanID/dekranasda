<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property string $kode_provinsi
 * @property string $nama_provinsi
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_provinsi', 'nama_provinsi'], 'required'],
            [['kode_provinsi'], 'string', 'max' => 2],
            [['nama_provinsi'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_provinsi' => 'Kode Provinsi',
            'nama_provinsi' => 'Nama Provinsi',
        ];
    }

    public function getKabupaten()
    {
        return $this->hasMany(Kabupaten::className(), ['kode_provinsi' => 'kode_provinsi']);
    }
}
