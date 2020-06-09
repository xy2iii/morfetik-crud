<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

use app\models\crud\config\ConfigAdjectifSouscatgram;

/* @var $this yii\web\View */
/* @var $model app\models\Adjectif */
/* @var $form yii\bootstrap4\ActiveForm */

$tmp = $relatedModel::find()->select(['Code'])->all();
foreach ($tmp as $m) {
    $flexArray[$m->Code] = $m->Code;
}

$tmp = ConfigAdjectifSouscatgram::find()->select(['option'])->all();
foreach ($tmp as $m) {
    $sousCatgramArray[$m->option] = $m->option;
}

$isNew = $model->isNewRecord;
$suffix = $isNew ? 'create' : 'update';
$path = '/crud/adjectif/' . $suffix;
?>

<div class="adjectif-form">

    <?php $form =
        ActiveForm::begin(['action' => [$path, 'id' => $model->ID]]); ?>

    <?= $form->field($model, 'ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lemme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CatGram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'souscatgram')->dropDownList($sousCatgramArray) ?>

    <?= $form->field($model, 'Flex')->dropDownList($flexArray) ?>

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