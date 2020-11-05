<?php


namespace app\controllers;


use app\models\Bill;

class ReportsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /** @var Bill[] $allBills */
        $allBills = Bill::find()
            ->orderBy("date ASC")
            ->all();

        $result = [];
        foreach ($allBills as $bill) {
            $result[$bill->date][] = $bill;
        }

        return $this->render('index', [
            'data' => $result
        ]);
    }
}