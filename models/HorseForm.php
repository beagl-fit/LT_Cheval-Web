<?php

namespace app\models;

use yii\base\Model;

class HorseForm extends Model
{

    public $id;
    public $name;
    public $imageFile;
    public $birth;
    public $owner;
    public $status;
    public $mare;
    public $father;
    public $mother;
    public $father_father;
    public $father_mother;
    public $mother_father;
    public $mother_mother;
    public $for_sale;
    public $url;
    public $foals;
    public $covered_by;
    public $deleted;
    public $sex;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'birth', 'father', 'mother', 'father_father', 'father_mother', 'mother_father', 'mother_mother', 'sex'], 'required'],
            [['birth'], 'safe'],
            [['status', 'foals', 'sex'], 'string'],
            [['mare', 'for_sale', 'deleted', 'id'], 'integer'],
            [['name', 'father', 'mother', 'father_father', 'father_mother', 'mother_father', 'mother_mother', 'covered_by'], 'string', 'max' => 100],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true],
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
            'id' => 'Horse',
            'name' => 'Name',
            'image_name' => 'Image Name',
            'imageFile' => 'Image',
            'birth' => 'Birth',
            'owner' => 'Owner(s) - default: Lokotrans',
            'status' => 'Status',
            'mare' => 'Mare',
            'father' => 'Father',
            'mother' => 'Mother',
            'father_father' => "Father's Father",
            'father_mother' => "Father's Mother",
            'mother_father' => "Mother's Father",
            'mother_mother' => "Mother's Mother",
            'for_sale' => 'For Sale',
            'url' => 'Url (needs http(s)://www...)',
            'foals' => 'Foals',
            'covered_by' => 'Covered By',
            'deleted' => 'Delete',
            'sex' => 'Sex',
        ];
    }
}
