<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\Posts;
use app\models\Categories;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex(){
        // выборка всех постов
        $array_posts = Posts::find()->all();
        
        return $this->render('index', ['array_posts' => $array_posts]);
    }

    public function actionCategories($category){
        //получаем айди категории. тут получается строка . $rows_categories->id - это айди
        $rows_categories = Categories::find()->where('alias=:alias', [':alias' => $category])->one();
        // если запрашиваемой категории нет в бд выбрасываем исключение 404
        if(!$rows_categories){ throw new \yii\web\HttpException(404, '404 Not Found! Такой страницы не существует!'); return false; }
        // делаем выборку постов
        $array_posts = Posts::find()
            ->where('category_id=:category_id', [':category_id' => $rows_categories->id])
            ->limit(10)
            ->all();

        return $this->render('category', ['array_posts' => $array_posts, 'array_category' => $rows_categories]);
    }

    public function actionPost($category, $post){
        //получаем пост. тут получается строка
        $rows_post = Posts::find()->where('alias=:alias', [':alias' => $post])->one();
        // проверяем есть ли такой пост и принаджежит ли этот пост данной категории
        if($rows_post && $category == $rows_post->category->alias){
            return $this->render('post', ['array_post' => $rows_post]);
        }
        // если не было найдено поста. или категория поста не соответствовала запросу то значит такой страницы у нас нет.
        // выбрасываем исключение 404 not found
        throw new \yii\web\HttpException(404, '404 Not Found! Такой страницы не существует!'); 
        return false;
    }



}
