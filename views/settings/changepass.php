<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Смена пароля';
?>

<h3>Смена пароля</h3>
<?php
if(isset($error)){
    echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>';
}
if(isset($result)){
    echo '<div class="alert alert-success">'.$result.'</div>';
}else{
    echo Html::beginForm(['settings/changepass'],'post',['class'=>'']
							).Html::input('password','newpass',null,['class'=>'form-control','style'=>'margin-top:10px;']
							).Html::input('password','confirm',null,['class'=>'form-control','style'=>'margin-top:10px;']
							).Html::submitButton('Сменить пароль',['class' => 'btn btn-primary', 'name' => 'add-button','value'=>'1','style'=>'margin-top:10px;']
							).Html::endForm();
}
?>
