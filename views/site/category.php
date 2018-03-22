<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'Главная страница';
?>

<h1><?= $array_category->title ?></h1>

	<div class="_rows">
<?php foreach($array_posts as $post): ?>
		<div class="post_block col-lg-12">
			<h2><?= $post['title']; ?></h2>
			<p><?= $post['text']; ?></p>
			<div class="_rows">
				<div class="col-lg-10"></div>
				<div class="col-lg-2">
					<a href="<?= Url::to($post['category']->alias.'/'.$post['alias']); ?>">Читать далее..</a>
				</div>
			</div>
			<hr>
		</div>
<?php endforeach; ?>
	</div>