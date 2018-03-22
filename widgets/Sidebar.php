<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

use app\models\Categories;

class Sidebar extends Widget
{
	protected $content;

    public function run()
    {

        $cat = Categories::find()->all();

        $this->content = '<ul>';

        foreach($cat as $elem):
            $this->content .= '<li><a href="'.Url::to($elem['alias'], true).'">'.$elem['title'].'</a></li>';
        endforeach;

        $this->content .= '</ul>';

        return $this->content;
    }
}