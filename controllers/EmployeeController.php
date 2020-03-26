<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Employee;

class EmployeeController extends Controller
{
    // Read data
    public function actionIndex()
    {
        $employees = Employee::find()-> all();

        return $this->render('index', [
            'employees' => $employees,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Employee::findOne($id);
        if(Yii::$app->request->post()){
            $model->load(Yii::$app->request->post());
            if($model->save()){
                Yii::$app->session->setFlash('success','Data berhasil disimpan');
            }else{
                Yii::$app->session->setFlash('error','Data gagal disimpan');
            }
            return $this->refresh();
        }else{
            return $this->render('update', [
                'model'=>$model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $model = Employee::findOne($id);
        $model->delete();
        return $this->redirect(['index']);
    }
}