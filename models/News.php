<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $image_name
 * @property string $header_cs
 * @property string $header_en
 * @property string $header_fr
 * @property string $body_cs
 * @property string $body_en
 * @property string $body_fr
 * @property string|null $url
 * @property int $deleted
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['header_cs', 'header_en', 'header_fr', 'body_cs', 'body_en', 'body_fr'], 'required'],
            [['deleted'], 'integer'],
            [['image_name', 'header_cs', 'header_en', 'header_fr'], 'string', 'max' => 50],
            [['body_cs', 'body_en', 'body_fr'], 'string', 'max' => 1000],
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
            'image_name' => 'Image Name',
            'header_cs' => 'Header Cs',
            'header_en' => 'Header En',
            'header_fr' => 'Header Fr',
            'body_cs' => 'Body Cs',
            'body_en' => 'Body En',
            'body_fr' => 'Body Fr',
            'url' => 'Url',
            'deleted' => 'Deleted',
        ];
    }
}
