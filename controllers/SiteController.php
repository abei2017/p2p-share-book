<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Json;
use yii\base\Exception;
use yii\helpers\Url;

class SiteController extends Controller {



    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * 注册为新会员
     *
     * @author abei<abei@nai8.me>
     * @link http://book.nai8.me
     * @link https://github.com/abei2017/p2p-share-book
     * @return string
     */
    public function actionRegister(){
        $model = new User();
        if(Yii::$app->request->isPost){
            try {
                $model->load(Yii::$app->request->post());
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
                if($model->save() == false){
                    throw new Exception(implode('<br/>',$model->getFirstErrors()));
                }



                return Json::encode(['done' => true,'data'=>Url::to(['site/login'])]);
            } catch (Exception $e) {
                return Json::encode(['done' => false, 'error' => $e->getMessage()]);
            }
        }

        return $this->render('register',[
            'model'=>$model
        ]);
    }
}
