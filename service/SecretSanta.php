<?php
/**
 * Created by PhpStorm.
 * User: secret
 * Date: 12/10/15
 * Time: 4:10 PM
 */

namespace app\service;

abstract class SecretSanta {
    function secretSanta($list,$condition){
        $l=array_diff($list, $condition);
        if(count($l)>0){
            $rand=array_rand($l);
            return $l[$rand];
        }else{
            return $list;
        }
    }
} 