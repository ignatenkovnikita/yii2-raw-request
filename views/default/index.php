<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProviderAccessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('request', 'Raw Requests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raw-request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'application_id',
            'controller_id',
            'action_id',
//            'raw:ntext',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
