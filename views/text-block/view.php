<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var dmstr\news\models\TextBlock $model
*/

$this->title = 'Text Block ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Text Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
$returnUrl                     = (\Yii::$app->request->get('returnUrl') !== null)
                                    ? \Yii::$app->request->get('returnUrl') : null;
?>
<div class="text-block-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'id' => $model->id, 'returnUrl' => $returnUrl],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Text Block', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List'), ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <h3>
        <?= $model->title ?>    </h3>


    <?php $this->beginBlock('dmstr\news\models\TextBlock'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'id',
// generated by dmstr\news\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'news_id',
    'value' => ($model->getNews()->one() ? Html::a($model->getNews()->one()->title, ['crud/news/view', 'id' => $model->getNews()->one()->id,]) : '<span class="label label-warning">?</span>'),
],
			'title',
			'text_html:ntext',
			'source',
[
    'format' => 'html',
    'label'=>'Image',
    'attribute' => 'image',
    'value'=> \yii\helpers\Html::img($model->image, ['class' => 'img-responsive']),

],
			'published_at',
			'created_at',
			'updated_at',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id, 'returnUrl' => $returnUrl],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> TextBlock',
    'content' => $this->blocks['dmstr\news\models\TextBlock'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>
