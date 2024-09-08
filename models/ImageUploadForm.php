<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ImageUploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * Uploads the file to the server.
     * @return string|bool the file path if upload is successful, false otherwise
     */
    public function upload()
    {
        if ($this->validate()) {
            $basePath = \Yii::getAlias('@webroot/images/carousel/');
            $filePath = $basePath . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            if ($this->imageFile->saveAs($filePath)) {
                return $filePath;
            }
        }
        return false;
    }
}
