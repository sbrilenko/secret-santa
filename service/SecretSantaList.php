<?php
/**
 * Created by PhpStorm.
 * User: secret
 * Date: 12/10/15
 * Time: 4:10 PM
 */
namespace app\service;

class SecretSantaList extends SecretSanta  {
    private $kate='Катерина Мариина';
    private $sergey='Сергей Мариин';
    private $alena='Алена Павловская';
    private $kirill='Кирилл Матиенко';
    private $yaroslava='Ярослава Ткаченко';
    private $max='Максим Ткаченко';
    private $sbrilenko='Бриленко Сергей';

    public function getList(){
        return array(
            $this->kate,
            $this->sergey,
            $this->alena,
            $this->kirill,
            $this->yaroslava,
            $this->max,
            $this->sbrilenko
        );
    }
    public function conditions($name){
        if($name==$this->kate || $name==$this->sergey){
            return $this->katesergeycondition();
        }elseif($name==$this->alena || $name==$this->kirill){
            return $this->alenakirillcondition();
        }elseif($name==$this->yaroslava || $name==$this->max){
            return $this->yaroslavamaxcondition();
        }elseif($name==$this->sbrilenko){
            return $this->sbrilenkocondition();
        }
    }
    public function katesergeycondition(){
        return array($this->kate, $this->sergey);
    }
    public function alenakirillcondition(){
        return array($this->alena, $this->kirill);
    }
    public function yaroslavamaxcondition(){
        return array($this->yaroslava, $this->max);
    }
    public function sbrilenkocondition(){
        return array($this->sbrilenko);
    }

} 