<?php

namespace app\controllers;

use app\models\FindForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionFind()
    {
        $model = new FindForm();
        $post = Yii::$app->request->post('FindForm');
        if ($model->load(Yii::$app->request->post())/* && $model->contact()*/) {
            $model->ingredients = $post['ing_id'];
            $ing_ids = join(',', $post['ing_id']);
            $count = count($post['ing_id']);
            if($count<2){
                Yii::$app->session->setFlash('less2', 'Выберти минимум 2 ингридиента!');
                return $this->refresh();
            }

            $sql = "SELECT di.dish_id, d.dishname,
                        GROUP_CONCAT(i.ingname SEPARATOR '</span><span class=\"badge\">') AS ings,
                        COUNT(di.ing_id) AS ing_count
                    FROM wt_dishes d
                    INNER JOIN wt_dish_ing di ON di.dish_id = d.id
                    INNER JOIN wt_ingredients i ON
                        i.id = di.ing_id AND
                        i.id IN ($ing_ids)
                        GROUP BY d.id
                        HAVING ing_count>1
                        ORDER BY ing_count DESC";
            $connection = Yii::$app->getDb();
            $list = $connection->createCommand($sql)->queryAll();
            if(count($list)>0){
                Yii::$app->session->setFlash('finding', '');
            }else{
                Yii::$app->session->setFlash('finding', 'Не найдено не одного блюда по этим ингредиентам!');
            }
            //return $this->refresh();
            return $this->render('find', [
                'model' => $model,
                'list' => $list,
                'count' => $count,
            ]);
        } else {
            return $this->render('find', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
