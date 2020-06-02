<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CodesNom */
/* @var $form yii\bootstrap4\ActiveForm */

$isNew = $model->isNewRecord;
$suffix = $isNew ? 'create' : 'update';
$path = '/crud/codes-nom/' . $suffix;
?>

<div class="codes-nom-form">

    <?php $form =
        ActiveForm::begin(['action' => [$path, 'id' => $model->Code]]); ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Rad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'P')->textInput(['maxlength' => true]) ?>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>