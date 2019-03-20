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

<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->hiddenInput()->label(false); ?>

    <?php 
        echo $form->field($model, 'departure_id', [
            'template' => '{label}{input}{error}'
        ])->widget(Select2::classname(), [
            'data' => $station,
            'options' => ['placeholder' => 'Выберите станцию отправления'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php 
        echo $form->field($model, 'departure_time', [
            'template' => '{label}{input}{error}'
        ])->widget(TimePicker::classname());
    ?>

    <?php 
        echo $form->field($model, 'arrival_id', [
            'template' => '{label}{input}{error}'
        ])->widget(Select2::classname(), [
            'data' => $station,
            'options' => ['placeholder' => 'Выберите станцию прибытия'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php 
        echo $form->field($model, 'arrival_time', [
            'template' => '{label}{input}{error}'
        ])->widget(TimePicker::classname());
    ?>

    <?php 
        echo $form->field($model, 'cost', [
            'template' => '{label}{input}{error}'
        ])->widget(NumberControl::classname(), [
            'name' => 'integer-only',
            'maskedInputOptions' => ['digits' => 0],
        ]);
    ?>

    <?php 
        echo $form->field($model, 'carrier_id', [
            'template' => '{label}{input}{error}'
        ])->widget(Select2::classname(), [
            'data' => $carrier,
            'options' => ['placeholder' => 'Выберите перевозчика'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php 
        echo $form->field($model, 'days', [
            'template' => '{label}{input}{error}'
        ])->checkboxList([ 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье' ]);
    ?>
    
    <div class="form-group">
        <?php echo Html::submitButton(empty($model->id) ? 'Создать' : 'Обновить', ['class' => empty($model->id) ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
