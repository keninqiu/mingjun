<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $name
 * @property string $intro
 * @property string $link
 * @property string $description
 * @property string $specifications
 * @property string $features
 * @property string $detail
 * @property string $image
 * @property string $document
 * @property int $new
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    /**
     * @var UploadedFile
     */    
    public $documentFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id','new'], 'integer'],
            [['name'], 'required'],
            [['specifications','features', 'detail','description','intro','title','meta_keywords','meta_description'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['link', 'image', 'document'], 'string', 'max' => 200],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize' => 1024 * 1024 * 10],
            [['documentFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, pdf, doc, docx', 'maxSize' => 1024 * 1024 * 10]
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if($this->imageFile) {
                $imageFileName = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
                $this->image = '/'.$imageFileName;
            }
            
            if($this->documentFile) {
                $documentFile = 'uploads/' . $this->documentFile->baseName . '.' . $this->documentFile->extension;
                $this->document = '/'.$documentFile;                    
            }
 
            $this->link = '';       
            if($this->save()) {
                if($this->imageFile) {
                    $this->imageFile->saveAs($imageFileName);
                }
                if($this->documentFile) {
                    $this->documentFile->saveAs($documentFile);
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'intro' => 'Introduction',
            'link' => 'Link',
            'description' => 'Description',
            'specifications' => 'Specifications',
            'detail' => 'Detail',
            'image' => 'Image',
            'document' => 'Document',
            'new' => 'New',
        ];
    }
}
