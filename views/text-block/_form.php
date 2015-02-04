<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var dmstr\news\models\TextBlock $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="text-block-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= // generated by dmstr\news\providers\RelationProvider::activeField
$form->field($model, 'news_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(dmstr\news\models\News::find()->all(),'id','title'),
    ['prompt'=>'Choose...']
); ?>
			<?= $form->field($model, 'text_html')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'published_at')->textInput() ?>
			<?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>
			<?= $form->field($model, 'source')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'image')->widget('hrzg\moxiecode\moxiemanager\widgets\FilePicker', [
    "model"     => $model,
    // The data model that this widget is associated with
    "attribute" => "image",
    // The model attribute that this widget is associated with
    "options"   => [
        "class"          => "form-control",
        // CSS classes for Bootstrap Input group
        "placeholder"    => \Yii::t("app", "Click Select to insert a file..."),
        // Placeholder text in file InputField
        "readonly"       => true,
        // Boolean value enabled / disable file InputField
        "edit"           => true,
        // Boolean value show / hide EditButton
        "preview"        => true,
        // Boolean value show / hide PreviewButton
        //"insertCallback" => "callbackFunc",
        // Insert file callback will be executed when files are selected and inserted by the user
        //"directory"      => "/files/Test"
        // Default directory to open. Defaults to /files but can also be configured to /file/thumbs
    ]
]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'TextBlock',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?= Html::submitButton(
                        '<span class="glyphicon glyphicon-check"></span> ' . ($model->isNewRecord
                                    ? Yii::t('app', 'Create') : Yii::t('app', 'Save')),
                        ['class' => 'btn btn-primary']
            );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
