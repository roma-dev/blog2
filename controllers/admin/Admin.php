<?php
// Это будет основной контроллер который будут наследовать другие контроллеры админки
namespace app\controllers\admin;

use Yii;
use yii\web\Controller;

class Admin extends Controller {

    // создаем фильтр который будет запрещать всем пользователям кроме админа открывать страницы админки
    public function beforeAction($action){

        if (!parent::beforeAction($action)) { return false; }
        // если это не админ
        if(!$this->isAdmin()){
            // то запрещаем выполнить действие
            throw new \yii\web\HttpException(403, '403 Forbidden! Доступ запрещен!'); 
            return false;
        }
        // если это админ то все действия разрешены
        return true;
    }

    public function isAdmin(){
        // если это не гость и его значение admin равно 1. то выводим true
        if(!$this->isGuest() && Yii::$app->user->identity->admin) return true;
    }
    public function isGuest(){
       if( Yii::$app->user->isGuest ) return true;
    }

}