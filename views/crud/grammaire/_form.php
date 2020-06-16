<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Grammaire */
/* @var $form yii\bootstrap4\ActiveForm */
use app\models\crud\config\ConfigGramCatgram;
use app\models\crud\config\ConfigGramSouscatgram;

$tmp = ConfigGramCatgram::find()->select(['option', 'description'])->all();
foreach ($tmp as $m) {
    $catgramArray[$m->option] = "$m->option ($m->description)";
}

$tmp = ConfigGramSouscatgram::find()->select(['option', 'description'])->all();
foreach ($tmp as $m) {
    $sousCatgramArray[$m->option] = "$m->option ($m->description)";
}

$isNew = $model->isNewRecord;
$suffix = $isNew ? 'create' : 'update';
$path = '/crud/grammaire/' . $suffix;
?>

<div class="grammaire-form">

    <?php $form =
        ActiveForm::begin(['action' => [$path, 'id' => $model->ID]]); ?>

    <?= $form->field($model, 'Lemme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Forme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CatGram')->dropDownList($catgramArray) ?>

    <?= $form->field($model, 'souscatgram')->dropDownList($sousCatgramArray) ?>

    <?= $form->field($model, 'Gender')->dropDownList(['' => '', 'M' => 'M', 'F' => 'F']) ?>

    <?= $form->field($model, 'Number')->dropDownList(['' => '', 'S' => 'S', 'P' => 'P']) ?>

    <?= $form->field($model, 'Person')->dropDownList(['' => '', '1' => '1', '2' => '2', '3' => '3']) ?>

    <?= $form->field($model, 'Notes')->textInput(['maxlength' => true]) ?>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>