<?php
namespace core;
class Alone
{
    public static $classMap=array();
    static public function run(){
        echo 'run ok';
        $asda=new \core\Route();;
    }

    /**
     * 自动加载类
     */
    static public function load($class){
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