<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property float $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'content', 'price', 'keywords', 'description', 'img', 'hit', 'new', 'sale'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'description', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'img'], 'string', 'max' => 255],
            [['image'], 'file',  'extensions' => 'png, jpg'],

        ];
    }

    public function upload(){
        if($this->validate()){
            $this->image->saveAs("files/{$this->image->baseName}.{$this->image->extension}");
            //var_dump($this->image);
        }else{
            return false;
        }
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ продукта',
            'category_id' => '№ категории',
            'name' => 'Название продукта',
            'content' => 'Контент',
            'price' => 'Цена',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание',
            'img' => 'Картинка',
            'image' => 'Изображение',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
        ];
    }
}
