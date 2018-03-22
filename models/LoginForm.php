<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;

class LoginForm extends Model
{
	public $login;
    public $password;

    public function attributeLabels()
    {
        return [
            'login' => 'Введите Логин',
            'password' => 'Введите пароль',
        ];
    }

	public function rules()
	{
	    return [
	    	// обрезаем пустые начальные и конечные пробелы
	    	['login', 'trim'],

	    	// все поля обязательны к заполнению
	    	['login', 'required', 'message' => 'Поле не заполнено! Данное поле не может быть пустым!'],
	    	['password', 'required', 'message' => 'Поле не заполнено! Данное поле не может быть пустым!'],

	    	// поле Имя может содержать в себе буквы латинские, кирилические, цифры и тире
	    	['login', 'match', 'pattern' => '/^[a-zA-Z0-9А-Яа-я-]+$/', 'message' => 'Использованы недопустимые символы! Данное поле может сожержать буквы латиницы, кирилицы, цифры и знак тире!'],
	    	// поле имя не должно превышать 255 символов и быть меньше 3 символов
	    	['login', 'string', 'min' => '3', 'max' => '30', 'tooShort' => 'Слишком короткий! Данное поле должно состоять от 3 до 255 символов!', 'tooLong' => 'Слишком много символов! Данное поле должно состоять от 3 до 30 символов!'],

	        // поле имя не должно превышать 255 символов и быть меньше 3 символов
	    	['password', 'string', 'min' => '6', 'max' => '255', 'tooShort' => 'Слишком короткий! Данное поле должно состоять от 6 до 255 символов!', 'tooLong' => 'Слишком много символов! Данное поле должно состоять от 6 до 255 символов!'],
	    	['login', 'availableLogin'],
	    	['password', 'validateLogin']
	    ];
	}
	// проверяем существует ли в бд пользователь с таким логином
	public function availableLogin($attribute, $params){
		if( Users::getUser($attribute) ) $this->addError($attribute, 'Пользователь с таким логином не зарегистрирован!');
	}
	// проверяем есть ли в бд пара логин пароль.
	public function validateLogin($attribute, $params){
		// убеждаемся что до этого не было никаких ошибок валидации. если логин был введен с ошибкой зачем нам еще проверять пароль.
		if(!$this->hasErrors()){
			// находим пользователя в бд по login
			$user = Users::getUser($this->login);
			// если пользователь имеется в бд 
			if($user){
				// если введен неверный пароль
				if( !$user->validatePassword($this->password) ){
					$this->addError($attribute, 'Введен неверный пароль!');
				}
			}else{
				// если вдруг такого пользователя нет (хотя мы проверяли емаил раннее)
				// то выводим сообщение что пароль или логин введены не верно
				$this->addError($attribute, 'Пароль или Email введены неверно!');
			}
		}
	}
	// функция залогивания пользователя в системе
	public function loginUser(){
		if( Yii::$app->user->login(Users::getUser($this->login)) ) { return true; }
		else { return false; }
	}
	/*
    // функция выдает из базы один емаил
    public static function getUser($email){
        return Users::findOne(['email' => $email]);
    }

	public function validateEmail($attribute, $params){
		//var_dump($attribute);die;
		if(!Users::getUser($this->$attribute)){
			$this->addError($attribute, 'Такой Email не зарегистрирован!');
		}
	}



	public function validateLogin($attribute, $params){
		// убеждаемся что до этого не было никаких ошибок валидации
		if(!$this->hasErrors()){
			// находим пользователя в бд по емаилу
			$user = Users::getUser($this->email);
			// если пользователь имеется в бд 
			if($user){
				// если введен неверный пароль
				if( !$user->validatePassword($this->$attribute) ){
					$this->addError($attribute, 'Введен неверный пароль!');
				}
			}else{
				// если вдруг такого пользователя нет (хотя мы проверяли емаил раннее)
				// то выводим сообщение что пароль или логин введены не верно
				$this->addError($attribute, 'Пароль или Email введены неверно!');
			}
		}
	}

	public function loginUser(){
		if( Yii::$app->user->login(Users::getUser($this->email)) ) { return true; }
		else { return false; }
	}*/

}