<?php

use common\models\Poststatus;
use common\models\Adminuser;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php
        $psObjs = Poststatus::find()->all();
        $allStatus = ArrayHelper::map($psObjs, 'id', 'name');
    ?>
    <?= $form->field($model, 'status')->dropDownList(
            Poststatus::find()
            ->select(['name'])
            ->orderBy('position')
            ->indexBy('id')
            ->column(),
            ['prompt' => '请选择状态']
    ); ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'author_id')->dropDownList(
        Adminuser::find()
            ->select(['nickname'])
            ->indexBy('id')
            ->column(),
        ['prompt' => '请选择作者']
    ); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
