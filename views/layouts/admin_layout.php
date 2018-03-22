<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<div class="body container">

		<div class="header _rows">
			
			<div class="admin-top-menu col-lg-9">
				<ul>
				<?= "<li><a href=".Url::to(['/']).">Home</a></li>" ?>
				<?= "<li><a href=".Url::to(['/admin/dashboard']).">Dashboard</a></li>" ?>
				<?= "<li><a href=".Url::to(['/admin/table/users']).">Users</a></li>" ?>
				<?= "<li><a href=".Url::to(['/admin/table/categories']).">Categories</a></li>" ?>
				<?= "<li><a href=".Url::to(['/admin/table/posts']).">Posts</a></li>" ?>
				</ul>
			</div>
			
        	<ul class="login-logout col-lg-3">
				<?php 
			        if(Yii::$app->user->isGuest){
			            echo '<li><a href="'.Url::to(['/user/registration'], true).'">Регистрация</a></li><li><a href="'.Url::to(['/user/login'], true).'">Авторизация</a></li>';
			        }else{
			            echo '<li>'.Yii::$app->user->identity->login.'</li><li><a href="'.Url::to(['/user/logout'], true).'">Выйти</a></li>';
			        }
				?>
			</ul>

		</div>
		<div class="_rows">

			<div class="right-block col-lg-12">
				
	        	<?= $content ?>
			
			</div>
		</div>
	</div> <!-- body -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
