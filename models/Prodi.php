<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior; 
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "prodi".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $alamat
 * @property string $telpon
 * @property string $ketua
 *
 * @property Dosen[] $dosens
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'alamat', 'telpon', 'ketua'], 'required'],
            [['kode'], 'string', 'max' => 10],
            [['nama', 'alamat'], 'string', 'max' => 100],
            [['telpon'], 'string', 'max' => 20],
            [['ketua'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'telpon' => 'Telpon',
            'ketua' => 'Ketua',
        ];
    }

    /**
     * Gets query for [[Dosens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDosens()
    {
        return $this->hasMany(Dosen::className(), ['prodi_id' => 'id']);
    }

    public function behavior(){
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }
}
