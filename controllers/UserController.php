<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RegForm;
use app\models\LoginForm;
use app\models\Users;

class UserController extends Controller{

	public $layout = 'my_layout';

	public function actionRegistration(){
        // создаем объект модели
        $model = new RegForm();
        // если данные из формы отправлены
        if( isset($_POST['RegForm']) ){
            // загружаем данные в модель
            $model->load($_POST);
            // проверяем валидность пришедших данных и создаем пользователя в базе данных
            if($model->validate() ){ 
                // create object User
                $user_model = new Users();
                // registration user
                if( $user_model->registrationUser($model->login, $model->password) ){
                    // если все прошло успешно, то редиректим посетителя на страницу логина
                    return Yii::$app->getResponse()->redirect('/user/login');
                }            
            }
            // если валидация не прошла - выводим форму с показом ошибок
            return $this->render('registration', ['model' => $model]);
            
        }
        // если посетитель еще не отправлял формы, то мы рендерим форму модели
        return $this->render('registration', ['model' => $model]);
	}

    public function actionLogin(){
        // создаем объект модели
        $model = new LoginForm();
        // если данные из формы отправлены
        if( isset($_POST['LoginForm']) ){
            // загружаем данные в модель и проверяем на валидность
            if( $model->load($_POST) && $model->validate() ){
                // если все прошло успешно, то отмечаем пользователя как авторизованный
                if( $model->loginUser() ){
                    // если все логин прошел успешно - перенаправляем авторизованного пользователя на главную страницу
                    return Yii::$app->getResponse()->redirect('/'); 
                }
            }
            // если валидация не прошла - выводим форму с показом ошибок
            return $this->render('login', ['model' => $model]);
        }
        // если посетитель еще не отправлял формы, то мы рендерим форму модели
        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {   
        // если это неавторизованный посетитель зашел по этому адресу то перекидываем его на страницу авторизации
        if(Yii::$app->user->isGuest){
            return Yii::$app->getResponse()->redirect('/user/login'); 
        }
        // если это авторизованный, то делаем логаут
        Yii::$app->user->logout();
        // и перекидываем его на главную страницу
        return  Yii::$app->getResponse()->redirect('/');
    }


}