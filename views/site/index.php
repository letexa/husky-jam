<?php
    use kartik\grid\GridView;
?>

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
        'arrival_id',
        'arrival_time',
        'travel_time',
        'cost',
        'carrier_id',
        'days',
        ['class' => 'yii\grid\ActionColumn']
    ]
]); ?>

