<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Adjectif */
/* @var $form yii\bootstrap4\ActiveForm */

$isNew = $model->isNewRecord;
$suffix = $isNew ? 'create' : 'update';
$path = '/crud/config/domaine/' . $suffix;
?>

<div class="adjectif-form">

    <?php $form =
        ActiveForm::begin(['action' => [$path, 'id' => $model->ID]]); ?>

    <?= $form->field($model, 'option')->textInput(['maxlength' => true]) ?>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>