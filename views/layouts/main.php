<?php
/**
 * @var string $content
 */
use yii\helpers\Html;

app\assets\ApplicationAssetBundle::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
    <h1 class="text-center">Тестовое задание для Husky Jam</h1>
    <div class="row">
        <div class="col-sm-2">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="/">Главная</a>
                <a class="navbar-brand" href="#">Navbar</a>
            </nav>
        </div>
        <div class="col-sm-10">
            <?= $content ?>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
