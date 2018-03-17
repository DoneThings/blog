<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'contentOptions' => ['width' => '30px'],
            ],
            [
                'attribute' => 'content',
                'value' => 'beginning',
            ],
            [
                'attribute' => 'status',
                'value' => 'status0.name',
                'filter' => \common\models\Commentstatus::find()
                    ->select(['name'])
                    ->orderBy(['Position' => SORT_ASC])
                    ->indexBy('id')
                    ->column(),
                'contentOptions' => function($model) {
                    return ($model->status == 1) ? ['class' => 'bg-danger']: [];
                }
            ],
            'create_time:datetime',
            [
                'attribute' => 'user.username',
                'value' => 'user.username',
                'label' => '作者',
            ],
            //'email:email',
            //'url:url',
            'post.title',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}{approve}',
                'buttons' => [
                    'approve' => function($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '审核'),
                            'aria-label' => Yii::t('yii', '审核'),
                            'data-confirm' => Yii::t('yii', '确定通过该评论？'),
                            'data-method' => 'post',
                            'data-pjax' => 0,
                        ];
                        return Html::a('<span class="glyphicon glyphicon-check"></span>', $url, $options);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
