<?php

namespace app\controllers;

use app\models\Players;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

//    public function actionGeneratetokens()
//    {
//        $alllist=Yii::$app->ss->getList();
//        for($i=0;$i<count($alllist);$i++){
//           /*lets find playesr*/
//            $finplayes = Players::find()
//                ->where(['nameofagiver' => $alllist[$i]])
//                ->all();
//           if(!$finplayes){
//               $player=new Players();
//               $player->nameofagiver=$alllist[$i];
//               $player->date=time();
//               $player->token=Players::generateToken();
//               $player->save();
//           }
//        }
//        return $this->redirect('/index.php?r=site%2Fall');
//    }
    public function actionChooseplayer(){
        if (Yii::$app->request->post()){
            $post = Yii::$app->request->post();
            $all=Players::findAll(['status'=>0]);
            for($i=0;$i<count($all);$i++){
                $all_[]=$all[$i]->nameofagiver;
            }
            $post['player_code']=trim($post['player_code']);
            if(empty($post['player_code'])){
                return json_encode(['error'=>'Код не может быть пустым']);
            }
            $findcode=Players::findOne(['token'=>$post['player_code']]);
            if($findcode){
                if($findcode->whogift==0){
                    $fdsfsdfsf=Yii::$app->ss->secretSanta($all_,Yii::$app->ss->conditions($findcode->nameofagiver));
                    $nameofagiver=Players::findOne(['nameofagiver'=>$fdsfsdfsf]);
                    if($nameofagiver){
                        $findcode->whogift=$nameofagiver->id;
                        $findcode->save();

                        $nameofagiver->status=1;
                        $nameofagiver->date=time();
                        $nameofagiver->save();
                    }
                    return json_encode(['result'=>$fdsfsdfsf]);
                }
                else{
                    return json_encode(['error'=>'Вы уже выбрали']);
                }
            }else{
                return json_encode(['error'=>'Код неверен']);
            }
        }
        else{
            return json_encode(['error'=>'Wrong format']);
        }
    }

//    public function actionAll()
//    {
//        $this->layout = 'next';
//        $finallrecords = Players::find()->all();
//        return $this->render('all',['ret'=>$finallrecords]);
//    }

//    public function actionRemoveallforme()
//    {
//        Players::deleteAll();
//        return $this->redirect('/index.php?r=site%2Fgeneratetokens');
//    }
}
