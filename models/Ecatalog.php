<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Ecatalog".
 *
 * @property int $id
 * @property string $image
 * @property string $url
 */
class Ecatalog extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Ecatalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'string', 'max' => 200],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize' => 1024 * 1024 * 10],
            [['url'], 'string', 'max' => 200],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if($this->imageFile) {
                $imageFileName = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
                $this->image = '/'.$imageFileName;
            }
  
            if($this->save()) {
                if($this->imageFile) {
                    $this->imageFile->saveAs($imageFileName);
                }                                                                          
                return true;
            }
            else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'url' => 'Url',
        ];
    }
}
