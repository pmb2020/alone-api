<?php
/**
 * 
 */
class Route 
{
	
	function __construct()
	{
		echo "route初始化";
	}

	/*
	**找url对应的控制器，并自动加载
	*/
	static function get($url,$ControllerPath){
		$acticon=explode('@', $ControllerPath);
		include_once '../app/Controller/'.$acticon[0];
		print_r($acticon);
		// echo "string";
		return '我是'.$url.'中的'.$ControllerPath.'控制器';
	}
}