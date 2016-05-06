<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anggota".
 *
 * @property integer $id
 * @property string $nama
 * @property string $email
 * @property integer $no_tlp
 * @property string $no_ktp
 * @property string $alamat
 * @property string $wilayah
 * @property string $image
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
    public static function tableName()
    {
        return 'anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
            [['no_tlp'], 'integer'],
            [['nama', 'email', 'no_ktp', 'alamat', 'wilayah','jenis_pendaftaran','bahan_baku','id_provinsi','id_kota','id_kecamatan'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg','maxFiles'=>0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'nama' => 'Nama',
            'email' => 'Email',
            'no_tlp' => 'No Tlp',
            'no_ktp' => 'No Ktp',
            'alamat' => 'Alamat',
            'wilayah' => 'Wilayah',
            'image' => 'Image',
            'logo' => 'Logo',
            'jenis_pendaftaran' => 'Jenis Pendaftaran',
            'bahan_baku' => 'Bahan Baku',
            'id_provinsi' => 'Provisi',
            'id_kota' => 'Kabupaten / Kota',
            'id_kecamatan' => 'Kecamatan',
        ];
    }
}
