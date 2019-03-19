<?php

use kartik\select2\Select2;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Resort */
/* @var $form yii\bootstrap\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?php echo Html::submitButton(empty($model->id) ? 'Создать' : 'Обновить', ['class' => empty($model->id) ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
