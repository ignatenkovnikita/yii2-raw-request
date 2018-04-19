<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\generated\models\RawRequest */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('request', 'Raw Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raw-request-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'application_id',
            'controller_id',
            'action_id',
            'raw:ntext',
            [
                'label' => 'Formatted',
                'format' => 'html',
                'value' => function ($data) {
                    $json = json_decode($data->raw, true);
                    return '<pre>' . print_r($json, true) . '</pre>';
//                return json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                }
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
