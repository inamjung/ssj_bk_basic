<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จำนวนผู้ป่วยในรายเดือน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a(' <i class="glyphicon glyphicon-plus"></i> เพิ่มผู้ป่วยรายใหม่', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <?php Pjax::begin();?> 
    
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

<?php Pjax::end();?>

</div>          