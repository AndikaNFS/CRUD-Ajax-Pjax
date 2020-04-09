<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior; 
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "bidang_ilmu".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $deskripsi
 *
 * @property PenelitianDosen[] $penelitianDosens
 */
class BidangIlmu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bidang_ilmu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id'], 'integer'],
            [['deskripsi'], 'string'],
            [['nama'], 'string', 'max' => 45],
            [['id'], 'unique'],
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
            'deskripsi' => 'Deskripsi',
        ];
    }

    /**
     * Gets query for [[PenelitianDosens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenelitianDosens()
    {
        return $this->hasMany(PenelitianDosen::className(), ['bidang_ilmu_id' => 'id']);
    }

    public function behavior(){
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }
}
