<?php


namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;


class UploadImage extends Model
{
    public $image;

    public function rules() {
       return [
           [['image'], 'file', 'extensions' => 'png, jpg'],
       ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image->saveAs('files/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }


}