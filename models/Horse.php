<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horses".
 *
 * @property int $id
 * @property string $name
 * @property string|null $image_name
 * @property string $birth
 * @property string $owner
 * @property string $status
 * @property int $mare
 * @property string $father
 * @property string $mother
 * @property string $father_father
 * @property string $father_mother
 * @property string $mother_father
 * @property string $mother_mother
 * @property int $for_sale
 * @property string|null $url
 * @property string|null $foals
 * @property string|null $covered_by
 * @property int $deleted
 * @property string $sex
 */
class Horse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'birth', 'father', 'mother', 'father_father', 'father_mother', 'mother_father',
                'mother_mother', 'sex'], 'required'],
            [['birth'], 'safe'],
            [['status', 'foals', 'sex'], 'string'],
            [['mare', 'for_sale', 'deleted'], 'integer'],
            [['name', 'father', 'mother', 'father_father', 'father_mother', 'mother_father',
                'mother_mother', 'covered_by'], 'string', 'max' => 100],
            [['image_name'], 'string', 'max' => 50],
            [['owner'], 'string', 'max' => 200],
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
            'name' => 'Name',
            'image_name' => 'Image Name',
            'birth' => 'Birth',
            'owner' => 'Owner',
            'status' => 'Status',
            'mare' => 'Mare',
            'father' => 'Father',
            'mother' => 'Mother',
            'father_father' => 'Father Father',
            'father_mother' => 'Father Mother',
            'mother_father' => 'Mother Father',
            'mother_mother' => 'Mother Mother',
            'for_sale' => 'For Sale',
            'url' => 'Url',
            'foals' => 'Foals',
            'covered_by' => 'Covered By',
            'deleted' => 'Deleted',
            'sex' => 'Sex',
        ];
    }
}
