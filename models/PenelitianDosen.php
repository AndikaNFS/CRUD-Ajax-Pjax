<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior; 
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "penelitian_dosen".
 *
 * @property int $id
 * @property int $dosen_id
 * @property string $judul
 * @property string $mulai
 * @property string $akhir
 * @property string $tahun_ajaran
 * @property string|null $tim_riset
 * @property int $bidang_ilmu_id
 *
 * @property BidangIlmu $bidangIlmu
 * @property Dosen $dosen
 */
class PenelitianDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penelitian_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dosen_id', 'judul', 'mulai', 'akhir', 'tahun_ajaran', 'bidang_ilmu_id'], 'required'],
            [['dosen_id', 'bidang_ilmu_id'], 'integer'],
            [['judul'], 'string'],
            [['mulai', 'akhir'], 'safe'],
            [['tahun_ajaran'], 'string', 'max' => 5],
            [['tim_riset'], 'string', 'max' => 45],
            [['bidang_ilmu_id'], 'exist', 'skipOnError' => true, 'targetClass' => BidangIlmu::className(), 'targetAttribute' => ['bidang_ilmu_id' => 'id']],
            [['dosen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dosen_id' => 'Dosen ID',
            'judul' => 'Judul',
            'mulai' => 'Mulai',
            'akhir' => 'Akhir',
            'tahun_ajaran' => 'Tahun Ajaran',
            'tim_riset' => 'Tim Riset',
            'bidang_ilmu_id' => 'Bidang Ilmu ID',
        ];
    }

    /**
     * Gets query for [[BidangIlmu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBidangIlmu()
    {
        return $this->hasOne(BidangIlmu::className(), ['id' => 'bidang_ilmu_id']);
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

    public function behavior(){
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }
}
