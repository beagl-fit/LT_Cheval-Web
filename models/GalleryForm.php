<?php

namespace app\models;

use Yii;
use yii\base\Model;

class GalleryForm extends Model
{
    public $id;
    public $imageFile;
    public $author;
    public $deleted;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deleted', 'id'], 'integer'],
            [['author'], 'string', 'max' => 50],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imageFile' => 'Image',
            'author' => 'Author (default: Eva Kopečná)',
            'deleted' => 'Delete',
        ];
    }
}
