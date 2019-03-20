<?php
    use kartik\grid\GridView;
    use kartik\helpers\Html;
?>

<h2>Станции</h2>

<a class="btn btn-primary" href="/station/create" role="button" style="margin: 20px">Добавить запись</a>

<?php \yii\widgets\Pjax::begin(); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'columns' => [
            'id',
            'name',
            [
                'class' => 'yii\grid\ActionColumn', 
                'template'=>'{delete}',
                'buttons' => [
                    'delete' => function ($url, $data) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/station/delete/' . $data['id'], [
                                    'title' => Yii::t('app', 'lead-delete'),
                        ]);
                    }

                ]
            ]
        ]
    ]); ?>
<?php \yii\widgets\Pjax::end(); ?>

