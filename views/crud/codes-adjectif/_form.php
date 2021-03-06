<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CodesAdjectif */
/* @var $form yii\bootstrap4\ActiveForm */

$isNew = $model->isNewRecord;
$suffix = $isNew ? 'create' : 'update';
$path = '/crud/codes-adjectif/' . $suffix;
?>

<div class="codes-adjectif-form">

    <?php $form =
        ActiveForm::begin(['action' => [$path, 'id' => $model->Code]]); ?>

    <?= $form->field($model, 'Code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Rad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FP')->textInput(['maxlength' => true]) ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>