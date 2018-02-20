<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $link
 * @property string $description
 * @property string $specifications
 * @property string $features
 * @property string $detail
 * @property string $image
 * @property string $document
 */
class Product extends \yii\db\ActiveRecord
{
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
            [['category_id'], 'integer'],
            [['name'], 'required'],
            [['specifications','features', 'detail','description'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['link', 'image', 'document'], 'string', 'max' => 200]
        ];
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
            'link' => 'Link',
            'description' => 'Description',
            'specifications' => 'Specifications',
            'detail' => 'Detail',
            'image' => 'Image',
            'document' => 'Document',
        ];
    }
}