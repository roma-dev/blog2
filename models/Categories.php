<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Categories extends ActiveRecord{

	public static function tableName(){
		return 'categories';
	}	

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'alias'], 'safe'],
        ];
    }


}