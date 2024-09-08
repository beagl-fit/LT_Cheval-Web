<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "racing".
 *
 * @property int $id
 * @property string $date
 * @property string $state
 * @property string $length
 * @property string $horse
 * @property string $url
 * @property int $deleted
 */
class Race extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'racing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'state', 'length', 'horse'], 'required'],
            [['date'], 'safe'],
            [['deleted'], 'integer'],
            [['state'], 'string', 'max' => 4],
            [['length'], 'string', 'max' => 10],
            [['horse'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 2048],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'state' => 'State',
            'length' => 'Length',
            'horse' => 'Horse',
            'url' => 'Url',
            'deleted' => 'Deleted',
        ];
    }
}
