<?php
namespace app\models;

use yii\base\Model;

class NewsForm extends Model
{
    public $id;
    public $imageFile;
    public $header_cs;
    public $header_en;
    public $header_fr;
    public $body_cs;
    public $body_en;
    public $body_fr;
    public $url;
    public $deleted;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['header_cs', 'header_en', 'header_fr', 'body_cs', 'body_en', 'body_fr'], 'required'],
            [['deleted'], 'integer', 'skipOnEmpty' => true],
            [['header_cs', 'header_en', 'header_fr'], 'string', 'max' => 50],
            [['body_cs', 'body_en', 'body_fr'], 'string', 'max' => 1000],
            [['url'], 'string', 'max' => 2048, 'skipOnEmpty' => true],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true],
        ];
    }

    public function attributeLabels()
    {
        return [
            'imageFile' => 'Image (optional)',
            'header_cs' => 'Titulek CZ',
            'header_en' => 'Header EN',
            'header_fr' => 'Header FR',
            'body_cs' => 'Tělo textu CZ',
            'body_en' => 'Body EN',
            'body_fr' => 'Body FR',
            'url' => 'Url (optional), (needs http(s)://www...)',
            'deleted' => 'Delete',
            'id' => 'Titulek',  // for simplicity reasons of update form
        ];
    }
}
