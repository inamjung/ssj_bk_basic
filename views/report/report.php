<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use miloschuman\highcharts\Highcharts;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จำนวนผู้ป่วยในรายเดือน';
$this->params['breadcrumbs'][] = $this->title;
?>

 <h3><?= Html::encode($this->title) ?></h3>
   
    <?php 
    echo Highcharts::widget([
    'options'=>[        
        'title'=>['text'=>'จำนวนผู้ป่วยในรายเดือนปี2558'],
        'xAxis'=>[
            'categories'=>$mm
        ],
        'yAxis'=>[
            'title'=>['text'=>'จำนวน(คน)']
        ],
        'series'=>[
            [               
                'type'=>'pie',
                'name'=>'จำนวน',
                'data'=>$cn,
            ],
            
        ]
    ]
]);?>
    
    
    <?php echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel'=>$searchModel,    
    'responsive' => TRUE,
    'hover' => true,    
    'panel' => [
        'before' => '',
        'type' => \kartik\grid\GridView::TYPE_SUCCESS,        
    ],    
    'columns' => [
        ['class'=>'kartik\grid\SerialColumn'],

           [
               'label'=>'ปี',
               'attribute'=>'yy'
           ],
            [
                  'label'=>'เดือน',
                  'attribute'=>'mm'
              ],
            [
                  'label'=>'จำนวน',
                  'attribute'=>'cn'
              ],
           ]
    
]);
?>  


</div>          