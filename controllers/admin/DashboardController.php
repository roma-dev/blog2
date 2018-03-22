<?php
namespace app\controllers\admin;


class DashboardController extends Admin {

	public $layout = 'admin_layout';

    public function actionIndex(){
    	return $this->render('index');
    }

}