<?php
use app\models\Bill;
use app\models\Category;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Lançamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'date',
                'format' => 'date',
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 115px'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            'description',
            [
                'attribute' => 'category_id',
                'filter' => Category::getOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 145px'],
                'contentOptions' => ['class' => 'text-center'],
                'content' => function (Bill $model, $key, $index, $column) {
                    return $model->category->name;
                }
            ],
            [
                'attribute' => 'type',
                'filter' => Bill::getTypeOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 160px'],
                'contentOptions' => ['class' => 'text-center'],
                'content' => function (Bill $model, $key, $index, $column) {
                    return $model->getTypeText();
                }
            ],
            [
                'attribute' => 'amount',
                // 'format' => 'currency',
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 100px'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'status',
                'filter' => Bill::getStatusOptions(),
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 160px'],
                'contentOptions' => ['class' => 'text-center'],
                'content' => function (Bill $model, $key, $index, $column) {
                    $labelClass = ($model->isOpened() ? 'label-warning' : 'label-success');
                    return '<span class="label '. $labelClass .'">'. $model->getStatusText() .'</span>';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width: 90px'],
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>
</div>
