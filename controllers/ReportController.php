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
        for($i=0;$i<sizeof($data);$i++){
            $yy[] = $data[$i]['yy'];           
            $mm[] = $data[$i]['mm'];
            $cn[] = $data[$i]['cn']*1;

        }
        
       $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
            
        ]);
        return $this->render('report',[
            'dataProvider'=>$dataProvider,
            'yy'=>$yy,
            'mm'=>$mm,
            'cn'=>$cn
            
         ]);
        }
        
       public function actionReport1(){
        $date1 = "";
        $date2 = "";    
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }
        
        $sql = "SELECT YEAR(dchdate)as yy,
            MONTH(dchdate)as mm,
            COUNT(an) as cn
            from an_stat
            where dchdate BETWEEN '$date1' AND '$date2'
            GROUP BY yy,mm
            ORDER BY yy";
        try {
            $rawData = \Yii::$app->db2->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
       $dataProvider = new ArrayDataProvider([
            'allModels'=>$rawData,
            
        ]);
        return $this->render('report1',[
            'dataProvider'=>$dataProvider,
            'sql'=>$sql,
            'date1' => $date1,
            'date2' => $date2,   
            
         ]);
        } 
    }