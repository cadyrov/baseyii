<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
    $login = "";
	$changePass = '<li>' . Html::a('Сменить пароль',['/settings/changepass']) . '</li>';
	$users = "";
	if (Yii::$app->user->can('rbacManage')) {
		$users = '<li>' . Html::a('Пользователи',['/user/admin']) . '</li>';
	}
	$rights = "";
	if (Yii::$app->user->can('rbacManage')) {
		$rights = '<li>' . Html::a('Права', ['/user/rbac']) . '</li>';
	}
	if (Yii::$app->user->isGuest) {
		$login = '<li>' . Html::a('Вход', ['/login']) . '</li>';
	} else {
		$login = '<li class="dropdown" id="settingsdrop">
			<a href="#" class="dropdown-toggle keep_open"  data-toggle="dropdown" >' . Yii::$app->user->identity->username . '</a>
					<ul class="dropdown-menu keep_open" id="settings">
					<li>' . Html::a('Выход',['/logout']) . '</li>
					' . $changePass . '
					<li class="divider"></li>
					' . $users . '
					' . $rights . '
					<li class="divider"></li>
					<li class="disabled"><a href="#" >Справочники</a></li>
					</ul>
				</li>';

	}


?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            $login
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
