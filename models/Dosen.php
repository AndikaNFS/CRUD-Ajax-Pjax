<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior; 
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "dosen".
 *
 * @property int $id
 * @property string $nidn
 * @property string $nama
 * @property string|null $gelar_belakang
 * @property string|null $gelar_depan
 * @property string|null $jk
 * @property string $tmp_lahir
 * @property string $tgl_lahir
 * @property string|null $alamat
 * @property string|null $email
 * @property string $thn_masuk
 * @property int $prodi_id
 *
 * @property Prodi $prodi
 * @property Kegiatan[] $kegiatans
 * @property PenelitianDosen[] $penelitianDosens
 */
class Dosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nidn', 'nama', 'tmp_lahir', 'tgl_lahir', 'thn_masuk', 'prodi_id'], 'required'],
            [['tgl_lahir'], 'safe'],
            [['prodi_id'], 'integer'],
            [['nidn', 'gelar_depan'], 'string', 'max' => 20],
            [['nama', 'tmp_lahir', 'email'], 'string', 'max' => 45],
            [['gelar_belakang'], 'string', 'max' => 30],
            [['jk'], 'string', 'max' => 1],
            [['alamat'], 'string', 'max' => 100],
            [['thn_masuk'], 'string', 'max' => 11],
            [['prodi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['prodi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nidn' => 'Nidn',
            'nama' => 'Nama',
            'gelar_belakang' => 'Gelar Belakang',
            'gelar_depan' => 'Gelar Depan',
            'jk' => 'Jk',
            'tmp_lahir' => 'Tmp Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'thn_masuk' => 'Thn Masuk',
            'prodi_id' => 'Prodi ID',
        ];
    }

    /**
     * Gets query for [[Prodi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['id' => 'prodi_id']);
    }

    /**
     * Gets query for [[Kegiatans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKegiatans()
    {
        return $this->hasMany(Kegiatan::className(), ['dosen_id' => 'id']);
    }

    /**
     * Gets query for [[PenelitianDosens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenelitianDosens()
    {
        return $this->hasMany(PenelitianDosen::className(), ['dosen_id' => 'id']);
    }

    public function behavior(){
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }
}
