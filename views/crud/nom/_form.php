<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Nom */
/* @var $form yii\bootstrap4\ActiveForm */

use app\models\crud\config\ConfigNomSouscatgram;
use app\models\crud\config\ConfigDomaine;
/* @var relatedModel Related model to this catégorie. */

$tmp = $relatedModel::find()->select(['Code'])->all();
foreach ($tmp as $m) {
    $flexArray[$m->Code] = $m->Code;
}

$tmp = ConfigNomSouscatgram::find()->select(['option', 'description'])->all();
foreach ($tmp as $m) {
    $sousCatgramArray[$m->option] = "$m->option ($m->description)";
}

$tmp = ConfigDomaine::find()->select(['option', 'description'])->all();
foreach ($tmp as $m) {
    $domaineArray[$m->option] = "$m->option ($m->description)";
}

$isNew = $model->isNewRecord;
$suffix = $isNew ? 'create' : 'update';
$path = '/crud/nom/' . $suffix;
?>

<div class="nom-form">

    <?php $form =
        ActiveForm::begin(['action' => [$path, 'id' => $model->ID]]); ?>

    <?= $form->field($model, 'Lemme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CatGram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'souscatgram')->dropDownList($sousCatgramArray) ?>

    <?= $form->field($model, 'Flex')->dropDownList($flexArray) ?>

    <?= $form->field($model, 'Dom')->dropDownList($domaineArray) ?>

    <?= $form->field($model, 'variante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Notes')->textarea(['rows' => 6]) ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>