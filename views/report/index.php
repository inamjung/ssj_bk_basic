<?php
/* @var $this yii\web\View */
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\Url;

?>
<div class="well">
    <h3><span class="label label-info">รายงาน HOSxP ON WEB</span></h3>
</div>
<div class="row">
        <div class="col-xs-4 col-sm-4 col-md-12">
            <?php
    echo Highcharts::widget([
    'options'=>[        
        'title'=>['text'=>'จำนวนผู้ป่วยนอก รายเดือนปี2558'],
        'xAxis'=>[
            'categories'=>$ym
        ],
        'yAxis'=>[
            'title'=>['text'=>'จำนวน(คน)']
        ],
        'series'=>[
            [
                'type'=>'spline',
                'name'=>'คน',
                'data'=>$total,
            ],
            [
                'type'=>'bar',
                'color'=>'green',
                'name'=>'คน',
                'data'=>$total,
            ],          
        ]
    ]
]);?>
        </div>
              
    
</div><p>
<br>

<p>
    <?php
    echo Html::a('<i class="glyphicon glyphicon-search"></i> 1) จำนวนผู้ป่วยใน', ['report/report']);
    ?>
</p>
<p>
    <?php
    echo Html::a('<i class="glyphicon glyphicon-search"></i> 2) จำนวนผู้ป่วยตามช่วงวันที่', ['report/report1']);
    ?>
</p>

<div class="footerrow" style="padding-top: 60px">
    <div class="alert alert-success">
        หมายเหตุ : ระบบรายงานอยู่ระหว่างพัฒนาอย่างต่อเนื่อง
    </div>
</div>