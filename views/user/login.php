<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Авторизация'
?>

<h1>Авторизация</h1>

<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'login')->input('text'); ?>
	<?= $form->field($model, 'password')->input('password'); ?>
	<?= Html::submitButton('Авторизоваться'); ?>
<?php ActiveForm::end(); ?>
