<?php
    use kartik\grid\GridView;
    use kartik\helpers\Html;
?>

<a class="btn btn-primary" href="/schedule/edit" role="button" style="margin: 20px">Добавить запись</a>

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
                    \app\models\Station::findAll(), 'id', 'name'
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
                    \app\models\Station::findAll(), 'id', 'name'
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
            [
                'attribute' => 'days',
                'value' => function($data) {
                    return \app\models\Schedule::prepareDays($data['days']);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn', 
                'template'=>'{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $data) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/schedule/edit/' . $data['id'], [
                                    'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },
                    'delete' => function ($url, $data) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/schedule/delete/' . $data['id'], [
                                    'title' => Yii::t('app', 'lead-delete'),
                        ]);
                    }

                ]
            ]
        ]
    ]); ?>
<?php \yii\widgets\Pjax::end(); ?>

