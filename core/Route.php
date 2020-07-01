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
	    if ($_SERVER['REQUEST_URI']===$url){
		$arr=explode('@', $ControllerPath);
		$acticon=$arr[1];
		$controllerValue=$arr[0];
        $filePath=DS.'app'.DS.'Controllers'.DS.$controllerValue;
        $controv='\app\Controllers\\'.$controllerValue;
        if (!in_array($filePath,self::$routeMap)){
            $file=ROOTPATH.$filePath.'.php';
            if (is_file($file)){
                include $file;
                self::$routeMap[]=$filePath;
                $contro=new $controv;
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