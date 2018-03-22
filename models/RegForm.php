<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;

class RegForm extends Model
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
	        // вводимое значени должно быть уникальным
	        ['login', 'unique', 'targetClass' => 'app\models\Users', 'message' => 'Данное имя уже занято!'],
	        // поле имя не должно превышать 255 символов и быть меньше 3 символов
	    	['password', 'string', 'min' => '6', 'max' => '255', 'tooShort' => 'Слишком короткий! Данное поле должно состоять от 6 до 255 символов!', 'tooLong' => 'Слишком много символов! Данное поле должно состоять от 6 до 255 символов!'],
	    ];
	}
	// функция создает пользователя в бд
	/*public function creatUser(){
		$user = new User();
		$user->login = $this->login;
		$user->password = User::generateHash($this->password);
		return $user->save();
	}*/

}