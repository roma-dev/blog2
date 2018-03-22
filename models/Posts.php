<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

use app\models\Categories;

class Posts extends ActiveRecord {


   public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['title', 'text', 'alias'], 'safe'],
        ];
    }
    
	public static function tableName(){
		return 'posts';
	}

	public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

}