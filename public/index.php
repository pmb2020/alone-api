<?php
// 思路分解url，在路由文件中寻找对应的控制器文件加载，如果没有提示没有控制器
define('APPPATH', trim(__DIR__ . '/'));
define('ROOTPATH',realpath('../'));
define('CORE',ROOTPATH.'/core');
define('DS',DIRECTORY_SEPARATOR);
define('DEBUG',true);
//var_dump(ROOTPATH);

if (DEBUG){
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}
include CORE.DS.'Alone.php';
//\core\Alone::run();
//spl_autoload_register('\core\Alone::load');

include_once CORE.DS.'Route.php';
//new Route();
//加载用户自定义的路由
include_once ROOTPATH.DS.'route'.DS.'api.php';

//Route::get('/v1/getinfo','IndexController@test');
//Route ::get('/v2/getinfo','IndexController@index');
//Route::get('/v3/getinfo','VideoController@test');
//class Human{
// static public $head=1;
//  public function easyeat(){
//        echo '普通方法吃饭<br />';
//   }
//  static public function eat(){
//            echo '静态方法吃饭<br />';
//  }
// public function intro(){
//            echo $this->name;
//  }
// }
// Human::eat();
//include CORE.'/Test.php';
//Test::eat();
//print_r($Route);

//REQUEST_URI'], PHP_URL_PATH));//解析url,并且转为数组
// var_dump($url);
//echo $_SERVER['REQUEST_URI'];
// print_r(explode('/', $_SERVER['REQUEST_URI']));
// echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//echo Route('asda','adasd');
//include_once '../core/Route.php';
//include 'testClass.php';
//$sad=new testClass();
//echo testClass::Route();
//echo Route::get('/asd','IndexController@index');
//function Route($route,$controllerPath)
//{
//	return $controllerPath;
//}
