<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <div class="list-group">
        <?php foreach ($model->bills as $bill): ?>
            <?php $color = ($bill->type === 1 ? 'success' : 'danger') ?>
            <a href="<?= Url::to(['bills/update', 'id' => $bill->id]) ?>" class="list-group-item list-group-item-<?= $color ?>">
                <h4 class="list-group-item-heading"><?= $bill->description ?></h4>
                <p class="list-group-item-text">
                    <?= $bill->date ?> | R$ <?= $bill->amount ?>
                </p>
            </a>
        <?php endforeach; ?>
    </div>

</div>
