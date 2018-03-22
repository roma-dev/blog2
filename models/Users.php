<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Users extends ActiveRecord implements IdentityInterface {

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['login', 'password', 'admin'], 'safe'],
        ];
    }


	public static function tableName(){
		return 'users';
	}
	

	// функция генерирует хэш из пароля
    public static function generateHash($password){
        return Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    // функция выдает из базы один login
    public static function getUser($login){
        return Users::findOne(['login' => $login]);
    }

    // функция сравнения введенного пароля с паролем из бд
    public function validatePassword($password){
        if( Yii::$app->getSecurity()->validatePassword($password, $this->password) ) { return true; }
        else{ return false; }
    }

    // регистрация пользователя
    public function registrationUser($login, $password){
    	$this->login = $login;
    	$this->password = Users::generateHash($password);
    	return $this->save(); // сохраняем в бд данные
    }




    /*---------- IdentityInterface ---------*/
    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }
    
    public static function findIdentityByAccessToken($token, $type = null){ }
    public function getAuthKey(){ }
    public function validateAuthKey($authKey){ }    
}