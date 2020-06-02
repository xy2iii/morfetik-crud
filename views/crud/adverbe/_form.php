<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Adverbe */
/* @var $form yii\bootstrap4\ActiveForm */

$isNew = $model->isNewRecord;
$suffix = $isNew ? 'create' : 'update';
$path = '/crud/adverbe/' . $suffix;
?>

<div class="adverbe-form">

	<?php $form =
		ActiveForm::begin(['action' => [$path, 'id' => $model->ID]]); ?>

	<?= $form->field($model, 'ID')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'Lemme')->textInput(['maxlength' => true]) ?>


	<?php if (!Yii::$app->request->isAjax) { ?>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
	<?php } ?>

	<?php ActiveForm::end(); ?>

</div>