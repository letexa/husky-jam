<?php

use kartik\select2\Select2;
use kartik\helpers\Html;
use kartik\time\TimePicker;
use kartik\number\NumberControl;;
use kartik\datetime\DateTimePicker;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Resort */
/* @var $form yii\bootstrap\ActiveForm */
?>

<h2>Станции</h2>

<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'name')->input('text'); ?>
    
    <div class="form-group">
        <?php echo Html::submitButton('Создать', ['class' => empty($model->id) ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
