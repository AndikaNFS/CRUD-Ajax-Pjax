<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior; 
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "jenis_kegiatan".
 *
 * @property int $id
 * @property string $nama
 *
 * @property Kegiatan[] $kegiatans
 */
class JenisKegiatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_kegiatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[Kegiatans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKegiatans()
    {
        return $this->hasMany(Kegiatan::className(), ['jenis_kegiatan_id' => 'id']);
    }

     public function behavior(){
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }
}
