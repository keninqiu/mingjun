<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quote".
 *
 * @property int $id
 * @property string $subject
 * @property string $message
 * @property string $name
 * @property string $company
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $postal
 * @property string $country
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $type
 */
class Quote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject', 'message'], 'required'],
            [['subject', 'name', 'company', 'address', 'type'], 'string', 'max' => 500],
            [['message'], 'string', 'max' => 5000],
            [['city', 'province', 'postal', 'country', 'phone', 'fax', 'email'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'message' => 'Message',
            'name' => 'Name',
            'company' => 'Company',
            'address' => 'Address',
            'city' => 'City',
            'province' => 'Province',
            'postal' => 'Postal',
            'country' => 'Country',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'email' => 'Email',
            'type' => 'Business Type',
        ];
    }
}
