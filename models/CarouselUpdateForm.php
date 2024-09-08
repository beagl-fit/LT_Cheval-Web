<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class CarouselUpdateForm extends Model
{
    public $imageFile;
    public $imageId;

    /**
     * @var UploadedFile
     */
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif'],
            [['imageId'], 'integer'],
        ];
    }
}
