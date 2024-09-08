<?php

namespace app\models;

use yii\base\Model;

class RaceForm extends Model
{
    public $id;
    public $date;
    public $state;
    public $length;
    public $horse;
    public $url;
    public $deleted;

    public function rules()
    {
        return [
            [['date', 'state', 'length', 'horse'], 'required'],
            [['date'], 'safe'],
            [['deleted', 'id'], 'integer'],
            [['state'], 'string', 'max' => 4],
            [['length'], 'string', 'max' => 10],
            [['horse'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 2048],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'state' => 'State',
            'length' => 'Length',
            'horse' => 'Horse',
            'url' => 'Url',
            'deleted' => 'Delete',
        ];
    }
}