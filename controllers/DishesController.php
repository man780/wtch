<?php

namespace app\controllers;

use app\models\Ingredients;
use Yii;
use app\models\Dishes;
use app\models\DishesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DishesController implements the CRUD actions for Dishes model.
 */
class DishesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Dishes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DishesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dishes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dishes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dishes();

        $post = Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            foreach (Ingredients::findAll($post['Dishes']['ingredients']) as $ingredient) {
                /*$dishIng = new  DishIng();
                $dishIng->dish_id = $model->dish_id;
                $dishIng->ing_id = $ingredient->ing_id;
                if(!$dishIng->save()){
                    vd($dishIng->errors);
                }*/
                $model->link('ingredients', $ingredient);
            }
            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Dishes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
/*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {*/
        $post = Yii::$app->request->post();
        //vd(Ingredients::findAll($post['Dishes']['ingredients']));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->unlinkAll('ingredients', true);
            foreach (Ingredients::findAll($post['Dishes']['ingredients']) as $ingredient) {
                /*$dishIng = new  DishIng();
                $dishIng->dish_id = $model->dish_id;
                $dishIng->ing_id = $ingredient->ing_id;
                if(!$dishIng->save()){
                    vd($dishIng->errors);
                }*/
                $model->link('ingredients', $ingredient);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Dishes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dishes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dishes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dishes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
