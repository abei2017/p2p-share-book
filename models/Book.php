<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%book}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $owner_id
 * @property string $image
 * @property string $author
 * @property string $market_price
 * @property integer $now_user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%book}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'owner_id', 'image', 'author', 'market_price', 'now_user_id', 'created_at', 'updated_at'], 'required'],
            [['owner_id', 'now_user_id', 'created_at', 'updated_at'], 'integer'],
            [['market_price'], 'number'],
            [['name', 'image'], 'string', 'max' => 64],
            [['author'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'owner_id' => 'Owner ID',
            'image' => 'Image',
            'author' => 'Author',
            'market_price' => 'Market Price',
            'now_user_id' => 'Now User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
