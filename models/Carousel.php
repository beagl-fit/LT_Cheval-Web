<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Exception;


/**
 * This is the model class for table "carousel".
 *
 * @property int $id
 * @property string $image_name
 */
class Carousel extends ActiveRecord
{
    public function rules()
    {
        return [
            [['image_name'], 'required'],
            [['image_name'], 'string', 'max' => 50],
        ];
    }
    public static function tableName()
    {
        return '{{%carousel}}';
    }

    /**
     * Updates the image name based on the provided ID and new image name.
     *
     * @param int $id The ID of the carousel item to update.
     * @param string $newImageName The new image name.
     * @return bool Whether the update was successful.
     * @throws Exception
     */
    public function updateImageName($id, $newImageName)
    {
        $carousel = self::findOne($id);
        if ($carousel) {
            $carousel->image_name = $newImageName;
            return $carousel->save();
        }
        return false;
    }
}
