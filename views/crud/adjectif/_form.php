<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Adjectif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adjectif-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lemme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CatGram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Flex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lig')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Standard')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Notes')->textarea(['rows' => 6]) ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>