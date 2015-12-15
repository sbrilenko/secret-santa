<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "players".
 *
 * @property integer $id
 * @property string $nameofagiver
 * @property integer $whogift
 * @property integer $status
 * @property integer $date
 * @property string $token
 */
class Players extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'players';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nameofagiver', 'date', 'token'], 'required'],
            [['whogift', 'status', 'date'], 'integer'],
            [['nameofagiver'], 'string', 'max' => 120],
            [['token'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nameofagiver' => Yii::t('app', 'Nameofagiver'),
            'whogift' => Yii::t('app', 'Whogift'),
            'status' => Yii::t('app', 'Status'),
            'date' => Yii::t('app', 'Date'),
            'token' => Yii::t('app', 'Token'),
        ];
    }

    public static function generateToken(){
        return hash('sha256', microtime());
    }
    public function getToken(){
        return $this->token;
    }


}
