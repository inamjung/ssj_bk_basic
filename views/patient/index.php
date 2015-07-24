<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\Patient;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(' <i class="glyphicon glyphicon-plus"></i> เพิ่มผู้ป่วยรายใหม่', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin();?> 
    
    <?php echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'=>$searchModel,    
    'responsive' => TRUE,
    'hover' => true,    
    'panel' => [
        'before' => '',
        'type' => \kartik\grid\GridView::TYPE_SUCCESS,        
    ],    
    'columns' => [
        ['class'=>'kartik\grid\SerialColumn'],

            //'pid',
       
             [
                'attribute'=>'name', 
                'headerOptions'=>['class'=>'text-center'],
               // 'contentOptions'=>['class'=>'text-center'],  
             ],   
        [
                'attribute'=>'birth', 
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-center'],  
             ],
        [
                'attribute'=>'hn', 
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-center'],  
             ],
        [
                'attribute'=>'an', 
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-center'],  
             ],
       
            
             'cid',
            // 'hospcode',
            // 'date_addmit',
            // 'date_discharge',
             'ward',
             'pdx',
            // 'discharge_type',
            // 'admit_day',
             'address',
             'village',
            // 'tambon',
            // 'amphur',
            // 'province',
            // 'd_update',
            // 'note1',
            // 'note2',
            // 'note3',
            // 'note4',
            // 'sex',

[
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:120px;'],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{view}{update}</div>',
                'buttons'=>[
                    'view'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-search"> ดู</i>',$url,['class'=>'btn btn-info']);
                    }, 
                    'update'=>function($url,$model,$key){                        
                        return  Html::a('<i class="glyphicon glyphicon-pencil"></i> แก้ไข', $url, ['class' => 'btn btn-success']);
                    
                    },
//                    'delete'=>function($url,$model,$key){
//                         return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,[
//                                'title' => Yii::t('yii', 'Delete'),
//                                'data-confirm' => Yii::t('yii', 'คุณต้องการลบไฟล์นี้?'),
//                                'data-method' => 'post',
//                                'data-pjax' => '0',
//                                'class'=>'btn btn-default'
//                                ]);
//                    }
                ]
            ],         
        ]
    
]);
?>  

<?php Pjax::end();?>

</div>          