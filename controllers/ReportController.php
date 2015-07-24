<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
class ReportController extends Controller {
    public $enableCsrfValidation = false;
    
    public function actionReport(){
        
        $connection = Yii::$app->db2;
        $data = $connection->createCommand('SELECT YEAR(dchdate)as yy,
            MONTH(dchdate)as mm,
            COUNT(an) as cn
            from an_stat
            where dchdate BETWEEN "2015-01-01" AND "2015-12-31"
            GROUP BY yy,mm
            ORDER BY yy')->queryAll();
        
        //เตรียมข้อมูลส่งให้กราฟ
//        for($i=0;$i<sizeof($data);$i++){
//            $clinicname[] = $data[$i]['clinicname'];           
//            $a[] = $data[$i]['a']*1;
//            $b[] = $data[$i]['b']*1;
//            $c[] = $data[$i]['c']*1;
//            $d[] = $data[$i]['d']*1;
//            $e[] = $data[$i]['e']*1;
//        }
        
       $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
            
        ]);
        return $this->render('report',[
            'dataProvider'=>$dataProvider,
            //'clinicname'=>$clinicname,'a'=>$a,'b'=>$b,'c'=>$c,'d'=>$d,'e'=>$e,
         ]);
        }
    }