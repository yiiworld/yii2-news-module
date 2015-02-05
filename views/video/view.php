<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var dmstr\modules\news\models\Video $model
*/

$this->title = 'Video ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
$returnUrl                     = (\Yii::$app->request->get('returnUrl') !== null)
                                    ? \Yii::$app->request->get('returnUrl') : null;
?>
<div class="video-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'id' => $model->id, 'returnUrl' => $returnUrl],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Video', ['create'], ['class' => 'btn
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


    <?php $this->beginBlock('dmstr\modules\news\models\Video'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'id',
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'video_gallery_id',
    'value' => ($model->getVideoGallery()->one() ? Html::a($model->getVideoGallery()->one()->name, ['video-gallery/view', 'id' => $model->getVideoGallery()->one()->id,]) : '<span class="label label-warning">?</span>'),
],
			'title',
			'youtube_url:url',
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
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Video',
    'content' => $this->blocks['dmstr\modules\news\models\Video'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>