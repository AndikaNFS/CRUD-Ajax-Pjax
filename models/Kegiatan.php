<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior; 
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "kegiatan".
 *
 * @property int $id
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string $tempat
 * @property string|null $deskripsi
 * @property string|null $kepesertaan
 * @property string $nilai
 * @property int $jenis_kegiatan_id
 * @property int $dosen_id
 *
 * @property Dosen $dosen
 * @property JenisKegiatan $jenisKegiatan
 */
class Kegiatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kegiatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_mulai', 'tanggal_selesai', 'tempat', 'nilai', 'jenis_kegiatan_id', 'dosen_id'], 'required'],
            [['tanggal_mulai', 'tanggal_selesai'], 'safe'],
            [['deskripsi'], 'string'],
            [['jenis_kegiatan_id', 'dosen_id'], 'integer'],
            [['tempat'], 'string', 'max' => 100],
            [['kepesertaan'], 'string', 'max' => 20],
            [['nilai'], 'string', 'max' => 11],
            [['dosen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_id' => 'id']],
            [['jenis_kegiatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenisKegiatan::className(), 'targetAttribute' => ['jenis_kegiatan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'tempat' => 'Tempat',
            'deskripsi' => 'Deskripsi',
            'kepesertaan' => 'Kepesertaan',
            'nilai' => 'Nilai',
            'jenis_kegiatan_id' => 'Jenis Kegiatan ID',
            'dosen_id' => 'Dosen ID',
        ];
    }

    /**
     * Gets query for [[Dosen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDosen()
    {
        return $this->hasOne(Dosen::className(), ['id' => 'dosen_id']);
    }

    /**
     * Gets query for [[JenisKegiatan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisKegiatan()
    {
        return $this->hasOne(JenisKegiatan::className(), ['id' => 'jenis_kegiatan_id']);
    }

     public function behavior(){
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }
}
