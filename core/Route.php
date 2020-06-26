<?php
namespace core;
use app\Controllers\IndexController;

/**
 * 
 */
class Route 
{
    public static $routeMap=array();
	function __construct()
	{
//		exit();
	}

	static function test(){
	    echo 'test route';
    }

	/*
	**找url对应的控制器，并自动加载
	*/
	static function get($url,$ControllerPath){
	    if ($_SERVER['REQUEST_URI']===$url){
		$arr=explode('@', $ControllerPath);
		$acticon=$arr[1];
		$controllerValue=$arr[0];
        $temp='\app\Controllers\\'.$controllerValue;
        print_r($_SERVER['REQUEST_URI']);
        if (!in_array($temp,self::$routeMap)){
            $file=ROOTPATH.'\app\Controllers\\'.$controllerValue.'.php';
            if (is_file($file)){
                include $file;
                self::$routeMap[]=$temp;
                $contro=new $temp();
                $contro->$acticon();
            }else{
                echo '控制器'.$file.'不存在';
            }
        }else{
            $contro=new $temp();
            $contro->$acticon();
        }
        }else{
	        echo '404错误';
        }


	}
}