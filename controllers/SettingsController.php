<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use budyaga\users\models\User;

class SettingsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['settings','change','changepass','linkcalls'],
                'rules' => [
                    [
                        'actions' => ['changepass'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

	public function actionChangepass()
    {
        $error = null;
        $result = null;
        $newpass = Yii::$app->request->post('newpass');
        $confirm = Yii::$app->request->post('confirm');
        if (Yii::$app->request->post('add-button')) {
            if ($newpass!=$confirm) {
                $error = 'Новый пароль и подтверждение не совпадают';
            } else if ($confirm == null) {
                $error = 'Передайте новый пароль';
            } else {
                $model = User::findOne(Yii::$app->user->identity->id);
                $model->setPassword($newpass);
                if ($model->save()) {
                   $result = "пароль успешно изменен";
                }
            }
        }
        return $this->render('changepass', ['error' => $error, 'result' => $result]);
	}
}
