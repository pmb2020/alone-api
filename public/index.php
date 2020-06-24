<?php
// 思路分解url，在路由文件中寻找对应的控制器文件加载，如果没有提示没有控制器
define('APPPATH', trim(__DIR__ . '/'));
// echo "string";
// echo '这是第 " '  . __FILE__ . ' " 行';
// echo '该文件位于 " '  . __DIR__ . ' " ';
// $uri = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));//解析url,并且转为数组
// var_dump($url);
echo $_SERVER['REQUEST_URI'];
// print_r(explode('/', $_SERVER['REQUEST_URI']));
// echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo Route('asda','adasd');
function Route($route,$controllerPath)
{
	return $controllerPath;
}
