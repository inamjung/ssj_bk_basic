<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Cdisease;
use app\models\Campur;
use app\models\Ctambon;
use kartik\widgets\DepDrop;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="panel panel-primary">
    <div class="panel-heading">ทะเบียนคนไข้</div>
    <div class="panel-body">
    
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
           <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?> 
        </div>
         <div class="col-xs-4 col-sm-4 col-md-4">                       
             <?=$form->field($model,'birth')->widget(\yii\jui\DatePicker::classname(),[  
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,
                     ],
                      'options'=>['class'=>'form-control'
                     ],
                ]);
            ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
             <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
        </div>       
    
    </div>

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'an')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-xs-4 col-sm-4 col-md-4">           
             
             <?= $form->field($model, 'cid')->widget(\yii\widgets\MaskedInput::classname(), [
             'mask' => '9-9999-99999-99-9',
                ]) ?>
             
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'hospcode')->textInput(['maxlength' => true]) ?>
        </div>      
    
</div>
</div>
</div>      
      
     <div class="panel panel-danger">
    <div class="panel-heading">ประวัติการเจ็บป่วย</div>
    <div class="panel-body">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            
            <?=$form->field($model,'date_addmit')->widget(\yii\jui\DatePicker::classname(),[  
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,
                     ],
                      'options'=>['class'=>'form-control'
                     ],
                ]);
            ?>
        </div>
         <div class="col-xs-4 col-sm-4 col-md-4">
           
             <?=$form->field($model,'date_discharge')->widget(\yii\jui\DatePicker::classname(),[  
                    'language' => 'th',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,
                     ],
                      'options'=>['class'=>'form-control'
                     ],
                ]);
            ?>
        </div>             
    
</div>
    <div class="row">
        
         <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'ward')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">             
            <?= $form->field($model, 'pdx')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(Cdisease::find()->orderBy('diagcode')->all(), 'diagcode',                                
                        function($model,$defaultValue){
                                    return $model->diagcode.'-'.$model->disease;
                        }),                               
                        'options' => [                            
                        'placeholder' => '<--คลิกเลือกโรค-->'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>
            
        </div>       
    
</div>
<div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            
            <?= $form->field($model, 'discharge_type')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(\app\models\CdischarceType::find()->all(), 'discharge_id', 'discharge_name'),
                        'options' => [                            
                        'placeholder' => '<--คลิกเลือกประเภท-->'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
         <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'admit_day')->textInput() ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>       
    
</div>
    
   <div class="row">
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'village')->textInput(['maxlength' => true]) ?>
        </div>      
       
       
        <div class="col-xs-4 col-sm-4 col-md-4">                 
            <?=
            $form->field($model, 'amphur')->widget(Select2::className(), ['data' => 
                        ArrayHelper::map(Campur::find()->orderBy('ampurname')->all(), 'ampurcodefull', 'ampurname'),
                        'options' => [
                            'id'=>'ddl-ampur',
                        'placeholder' => '<--คลิกเลือกอำเภอ-->'],                        
                        'pluginOptions' =>
                        [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'tambon')->widget(DepDrop::classname(), [
            'options'=>['id'=>'ddl-tambon'],
            'data'=> $tambon,
            'pluginOptions'=>[
                'depends'=>['ddl-ampur'],
                'placeholder'=>'เลือกตำบล...',
                'url'=>Url::to(['/patient/get-tambon'])
            ]
        ]); ?>
        </div>
              
       
        </div>

<div class="row">
        
         <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-xs-4 col-sm-4 col-md-4">
             <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>
        </div>     
    
</div>
    
<div class="form-group">
            <div class="col-sm-offset-2 col-sm-9">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', 
            ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
    </div>
    
   

   
    <?php ActiveForm::end(); ?>

</div>
 </div>
</div>