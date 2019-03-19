<?php
    use kartik\grid\GridView;
?>

<a class="btn btn-primary" href="#" role="button">Добавить запись</a>

<?php \yii\widgets\Pjax::begin(); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'columns' => [
            [
                'class'=>\kartik\grid\DataColumn::className(),
                'attribute'=>'departure',
                'filterInputOptions'=>[ 'placeholder'=>'Any' ],
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                   'pluginOptions'=>[ 'allowClear'=>true ],
                ],
                'filter'=>\yii\helpers\ArrayHelper::map(
                    \app\models\Departure::findAll(), 'id', 'name'
                ),
                'format'=>'html',
                'width'=>'150px',
            ],
            'departure_time',
            [
                'class'=>\kartik\grid\DataColumn::className(),
                'attribute'=>'arrival',
                'filterInputOptions'=>[ 'placeholder'=>'Any' ],
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                   'pluginOptions'=>[ 'allowClear'=>true ],
                ],
                'filter'=>\yii\helpers\ArrayHelper::map(
                    \app\models\Arrival::findAll(), 'id', 'name'
                ),
                'format'=>'html',
                'width'=>'150px',
            ],
            'arrival_time',
            'travel_time',
            'cost',
            [
                'class'=>\kartik\grid\DataColumn::className(),
                'attribute'=>'carrier',
                'filterInputOptions'=>[ 'placeholder'=>'Any' ],
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                   'pluginOptions'=>[ 'allowClear'=>true ],
                ],
                'filter'=>\yii\helpers\ArrayHelper::map(
                    \app\models\Carrier::findAll(), 'id', 'name'
                ),
                'format'=>'html',
                'width'=>'150px',
            ],
            'days',
            ['class' => 'yii\grid\ActionColumn']
        ]
    ]); ?>
<?php \yii\widgets\Pjax::end(); ?>

