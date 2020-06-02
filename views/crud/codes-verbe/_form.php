<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CodesVerbe */
/* @var $form yii\bootstrap4\ActiveForm */

$isNew = $model->isNewRecord;
$suffix = $isNew ? 'create' : 'update';
$path = '/crud/codes-verbe/' . $suffix;
?>

<div class="codes-verbe-form">

    <?php $form =
        ActiveForm::begin(['action' => [$path, 'id' => $model->Code]]); ?>

    <?= $form->field($model, 'Code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Modele')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Rad')->textInput() ?>

    <?= $form->field($model, 'Rmodele')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Inf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indpr1S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indpr2S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indpr3S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indpr1P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indpr2P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indpr3P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indimp1S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indimp2S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indimp3S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indimp1P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indimp2P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indimp3P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indps1S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indps2S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indps3S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indps1P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indps2P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indps3P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indfut1S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indfut2S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indfut3S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indfut1P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indfut2P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Indfut3P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Condpr1S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Condpr2S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Condpr3S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Condpr1P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Condpr2P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Condpr3P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subpr1S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subpr2S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subpr3S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subpr1P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subpr2P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subpr3P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subimp1S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subimp2S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subimp3S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subimp1P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subimp2P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Subimp3P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Imppr2S')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Imppr1P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Imppr2P')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ppres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PpSM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PpSF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PpPM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PpPF')->textInput(['maxlength' => true]) ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>