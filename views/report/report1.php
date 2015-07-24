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

 <div class='well'>
    <form method="POST">
        ระหว่างวันที่:
        <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-5">
            <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ],
            'options'=>[
                'class'=>'form-control'
            ],
        ]);
        ?>
        ถึงวันที่:
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ],
            'options'=>[
                'class'=>'form-control'
            ],
            
        ]);
        ?>
        </div>
            
       <div class="col-xs-4 col-sm-4 col-md-2">
            <button class='btn btn-danger'>ประมวลผล</button>
        </div>   
         
</div>
        
    </form>
    
</div>
 
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
        //['class'=>'kartik\grid\SerialColumn'],

//           [
//               'label'=>'ปี',
//               'attribute'=>'yy'
//           ],
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