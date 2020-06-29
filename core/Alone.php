<?php
namespace core;
use core\Route;
//use core\Route;
class Alone
{
    public static $classMap=array();
    static public function run(){
        echo 'run ok';
//        \Route();
//        new Route();
//        \core\Route::get('sa','asd');
//        $asda=new Route();;
    }

    /**
     * 自动加载类
     */
    static public function load($class){
        echo '自动加载'.$class;
        if (!isset($classMap[$class])){
            $class=str_replace('\\','/',$class);
            $file=ROOTPATH. '/' .$class.'.php';
            if (is_file($file))
            {
                include $file;
                self::$classMap[$class]=$class;
            }else{
                return false;
            }
        }

    }
}