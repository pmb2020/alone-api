<?php

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
//	    echo $_SERVER['REQUEST_URI'];
//	    echo DS;
	    if ($_SERVER['REQUEST_URI']===$url){
		$arr=explode('@', $ControllerPath);
		$acticon=$arr[1];
		$controllerValue=$arr[0];
        $temp=DS.'app'.DS.'Controllers'.DS.$controllerValue;
//        print_r($_SERVER['REQUEST_URI']);
        if (!in_array($temp,self::$routeMap)){
            $file=ROOTPATH.$temp.'.php';
            if (is_file($file)){
                include $file;
                self::$routeMap[]=$temp;
                $contro=new $temp();
                $contro->$acticon();
//                print_r($contro);
            }else{
                echo '控制器'.$file.'不存在';
            }
        }else{
            $contro=new $temp();
            $contro->$acticon();
        }
        }else{
//	        print_r(self::$routeMap);
//            echo '404错误';
	        return false;
//	        echo '404错误';
        }


	}
}