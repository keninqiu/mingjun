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
 * @property string $image1
 * @property string $image2 
 * @property string $image3  
 * @property string $image4   
 * @property string $image5    
 * @property string $document
 * @property int $new
 * @property string $hashtags
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $imageFile1;
    public $imageFile2;
    public $imageFile3;
    public $imageFile4;
    public $imageFile5;
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
            [['imageFile1'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize' => 1024 * 1024 * 10],
            [['imageFile2'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize' => 1024 * 1024 * 10],
            [['imageFile3'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize' => 1024 * 1024 * 10],
            [['imageFile4'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize' => 1024 * 1024 * 10],
            [['imageFile5'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize' => 1024 * 1024 * 10],
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
            if($this->imageFile1) {
                $imageFileName1 = 'uploads/' . $this->imageFile1->baseName . '.' . $this->imageFile1->extension;
                $this->image1 = '/'.$imageFileName1;
            }
            if($this->imageFile2) {
                $imageFileName2 = 'uploads/' . $this->imageFile2->baseName . '.' . $this->imageFile2->extension;
                $this->image2 = '/'.$imageFileName2;
            }

            if($this->imageFile3) {
                $imageFileName3 = 'uploads/' . $this->imageFile3->baseName . '.' . $this->imageFile3->extension;
                $this->image3 = '/'.$imageFileName3;
            }
            if($this->imageFile4) {
                $imageFileName4 = 'uploads/' . $this->imageFile4->baseName . '.' . $this->imageFile4->extension;
                $this->image4 = '/'.$imageFileName4;
            }
            if($this->imageFile5) {
                $imageFileName5 = 'uploads/' . $this->imageFile5->baseName . '.' . $this->imageFile5->extension;
                $this->image5 = '/'.$imageFileName5;
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
                if($this->imageFile1) {
                    $this->imageFile1->saveAs($imageFileName1);
                }    
                if($this->imageFile2) {
                    $this->imageFile2->saveAs($imageFileName2);
                }   
                if($this->imageFile3) {
                    $this->imageFile3->saveAs($imageFileName3);
                }     
                if($this->imageFile4) {
                    $this->imageFile4->saveAs($imageFileName4);
                }  
                if($this->imageFile5) {
                    $this->imageFile5->saveAs($imageFileName5);
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
            'image1' => 'Image1',
            'image2' => 'Image2',
            'image3' => 'Image3',
            'image4' => 'Image4',
            'image5' => 'Image5',
            'document' => 'Document',
            'new' => 'New',
            'hashtags' => 'Hashtags',
        ];
    }
}
