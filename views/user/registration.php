<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация'
?>

<h1>Регистрация</h1>

<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'login')->input('text'); ?> 
	<?= $form->field($model, 'password')->input('password'); ?>
	<?= Html::submitButton('Зарегистрироваться'); ?>
<?php ActiveForm::end(); ?>