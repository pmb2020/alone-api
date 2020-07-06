<?php
namespace app\Controllers;
header('Access-Control-Allow-Origin: *');
class VideoController{
    public function index(){
        echo 'video index';
    }
    public function test(){
        echo 'VideoController';
    }
//    获取电影分类选择年份
    public function dianyingYear(){
        echo $this->reposeJson(200,'电影年份获取成功！',$this->dianyingTypeAll('year'));
    }
//    获取电影明星选择
    public function dianyingStar(){
        echo $this->reposeJson(200,'明星获取成功！',$this->dianyingTypeAll('star'));
    }
//    获取电影地域分类
    public function dianyingCountry(){
        echo $this->reposeJson(200,'电影地域分类获取成功！',$this->dianyingTypeAll('country'));
    }
//    获取电影分类
    public function dianyingType(){
        echo $this->reposeJson(200,'电影类型获取成功！',$this->dianyingTypeAll('type'));
    }
//    电视年份
    public function dianshiYear(){
        echo $this->reposeJson(200,'电视年份获取成功！',$this->dianshiTypeAll('year'));
    }
//    电视演员
    public function dianshiStar(){
        echo $this->reposeJson(200,'电视演员获取成功！',$this->dianshiTypeAll('star'));
    }
//    电视地域
    public function dianshiCountry(){
        echo $this->reposeJson(200,'电视地域获取成功！',$this->dianshiTypeAll('country'));
    }
//    电视类型
    public function dianshiType(){
        echo $this->reposeJson(200,'电视类型获取成功！',$this->dianshiTypeAll('type'));
    }
//    综艺类型
    public function zongyiType(){
        echo $this->reposeJson(200,'综艺类型获取成功！',$this->zongyiTypeAll('type'));
    }
//    综艺地域
    public function zongyiCountry(){
        echo $this->reposeJson(200,'综艺地域获取成功！',$this->zongyiTypeAll('country'));
    }
//    综艺演员
    public function zongyiStar(){
        echo $this->reposeJson(200,'综艺演员获取成功！',$this->zongyiTypeAll('star'));
    }
    public function dianshiTypeAll($type){
        $data=$this->pregData('https://www.360kan.com/dongman/list');
        $part1=array_chunk($data, 45);
        $part2=array_chunk($part1[0], 36);
        $part3=array_chunk($part2[0], 21);
//        $this->dd($part3);
        $starData=$part1[1];
        $countryData=$part2[1];
        $yearData=$part3[1];
        $typeData=$part3[0];
        switch ($type){
            case 'year':
                return $data;
            case 'star':
                return $starData;
            case 'country':
                return $countryData;
            default:
                return $typeData;
        }
    }
    public function zongyiTypeAll($type){
        $data=$this->pregData('https://www.360kan.com/zongyi/list');
        $part1=array_chunk($data, 55);
        $part2=array_chunk($part1[0], 24);
//        $part3=array_chunk($part2[0], 21);
//        $this->dd($data);
        $starData=array_merge($part2[1],$part2[2]);
        $countryData=$part1[1];
        $typeData=$part2[0];
        switch ($type){
            case 'star':
                return $starData;
            case 'country':
                return $countryData;
            default:
                return $typeData;
        }
    }
    public function zongyiTypeAll1(){
        $data=$this->pregData('https://www.360kan.com/zongyi/list');
        $part1=array_chunk($data, 55);
        $part2=array_chunk($part1[0], 24);
        $starData=array_merge($part2[1],$part2[2]);
        $countryData=$part1[1];
        $typeData=$part2[0];
        $arr=[
            'type'=> $typeData,
            'country'=>$countryData,
            'star' => $starData
        ];
        echo $this->reposeJson('200','综艺分类信息获取成功',$arr);
    }
    public function dianshiTypeAll1(){
        $data=$this->pregData('https://www.360kan.com/dianshi/list');
        $part1=array_chunk($data, 45);
        $part2=array_chunk($part1[0], 36);
        $part3=array_chunk($part2[0], 21);
        $starData=$part1[1];
        $countryData=$part2[1];
        $yearData=$part3[1];
        $typeData=$part3[0];
        $arr=[
            'type'=> $typeData,
            'year' => $yearData,
            'country'=>$countryData,
            'star' => $starData
        ];
        echo $this->reposeJson('200','电视分类信息获取成功',$arr);
    }
    public function dianyingTypeAll1(){
        $arr=$this->pregData('https://www.360kan.com/dianying/list');
        $part1=array_chunk($arr, 47);
        $part2=array_chunk($part1[0], 35);
        $part3=array_chunk($part2[0], 20);
        $starData=$part1[1];
        $countryData=$part2[1];
        $yearData=$part3[1];
        $typeData=$part3[0];
        $arr=[
            'type'=> $typeData,
            'year' => $yearData,
            'country'=>$countryData,
            'star' => $starData
        ];
        echo $this->reposeJson('200','电影分类信息获取成功',$arr);
    }
    public function dongmanTypeAll(){
        $data=$this->pregData('https://www.360kan.com/dongman/list');
        $part1=array_chunk($data, 53);
        $part2=array_chunk($part1[0], 35);
        $countryData=$part1[1];
        $yearData=$part2[1];
        $typeData=$part2[0];
        $arr=[
            'type'=>$typeData,
            'year' => $yearData,
            'country'=>$countryData
        ];
        echo $this->reposeJson(200,'动漫分类信息获取成功！',$arr);
    }
    public function dianyingTypeAll($type){
        $arr=$this->pregData('https://www.360kan.com/dianying/list');
        $part1=array_chunk($arr, 47);
        $part2=array_chunk($part1[0], 35);
        $part3=array_chunk($part2[0], 20);
        $starData=$part1[1];
        $countryData=$part2[1];
        $yearData=$part3[1];
        $typeData=$part3[0];
        switch ($type){
            case 'year':
                return $yearData;
            case 'star':
                return $starData;
            case 'country':
                return $countryData;
            default:
                return $typeData;
        }
    }
//    获取电视列表信息
    public function dianshiList(){
        echo $this->videoList('dianshi');
    }
//    获取电影列表信息
    public function dianyingList(){
        echo $this->videoList('dianying');
    }
//    获取综艺列表信息
    public function zongyiList(){
        echo $this->videoList('zongyi');
    }
//    获取动漫列表信息
    public function dongmanList(){
        echo $this->videoList('dongman');
    }
    public function videoList($type){
        $param=$_GET;
        $cat=$param['cat'] ?: 'all';
        $year=$param['year'] ?: 'all';
        $area=$param['area'] ?: 'all';
        $act=$param['act'] ?: 'all';
        $pageno=$param['page'] ?: '1';
        $url='https://www.360kan.com/dianshi/list?cat=101&year=2020&area=10&act=all&pageno=2';
        $url='https://www.360kan.com/'.$type.'/list?cat='.$cat.'&year='.$year.'&area='.$area.'&act='.$act.'&pageno='.$pageno;
        $html=$this->curlAlone($url);
//        $html = preg_replace("/\r|\n|\t/","",$this->curlAlone($url));
        $urlRule='/<a class="js-tongjic" href="(.*)">(\s|[\r\n])+<div class="cover g-playicon">/iU';//匹配链接
        $coverRule='/<div class="cover g-playicon">(\s|[\r\n])+<img src="(.*)">/iU';//匹配出图片$data[2]
        $titleRule='/<span class="s1">(.*)<\/span>/iU';//匹配出title
        $starRule='/<p class="star">(.*)<\/p>/iU';//匹配出主演
        $hintRule='/<div class="mask-wrap">(\s|[\r\n])+<span class="hint">(.*)<\/span>/iU';//更新到第几集，电影则是年份
        preg_match_all($urlRule,$html,$url);//$url[1]
        preg_match_all($coverRule,$html,$cover);//$cover[2]
        preg_match_all($titleRule,$html,$title);//$title[1]
        preg_match_all($starRule,$html,$star);//$star[1]
        preg_match_all($hintRule,$html,$hint);//$hint[2]
        for ($i=0;$i<count($url[1]); $i++){
            $arr[$i]=[
                'title'=> $title[1][$i],
                'cover' => $cover[2][$i],
                'url' =>  $url[1][$i],
                'star' => $star[1][$i],
                'hint' =>$hint[2][$i]
            ];
        }
        return $this->reposeJson(200,'success',$arr);
    }
    function pregData($url){
//        $url='https://www.360kan.com/dianying/list';
        $html = preg_replace("/\r|\n|\t/","",$this->curlAlone($url));
        $rule='/<a class="js-tongjip" href=\"(.*)" target="_self">(.*)<\/a>/iU';
        preg_match_all($rule,$html,$typeData);
        preg_match('/[\x7f-\xff]+/',$typeData[2][0],$name);
        for ($i=0;$i < count($typeData[1]);$i++){
            preg_match('/[\x7f-\xff]+/',$typeData[2][$i],$name);
            if (!$name){
                $name[0]=$typeData[2][$i];
            }
            $arr[]=[
                'name' => $name[0],
                'url' => $typeData[1][$i]
            ];
        }
        return $arr;
    }
    function curlAlone($url){
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; MSIE 7.0; Windows NT 6.1 )"); //设置UA
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    function reposeJson($code,$msg,$data){
        $respose=[
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
        return json_encode($respose,JSON_UNESCAPED_UNICODE);
    }
    function dd($data)
    {
        // 定义样式
        $str = '';
        if (is_bool($data)) {
            $show_data = $data ? 'true' : 'false';
        } elseif (is_null($data)) {
            $show_data = 'null';
        } else {
            $show_data = "<pre style=\"background: #ccc; color: #111; font: 16px 'Consolas'; text-align: left; width: 90%; padding: 5px\">\n";
            $show_data .= print_r($data, true);
            $show_data .= "</pre>\n";
            $show_data = print_r($show_data, true);
        }
        $str .= $show_data;
        $str .= '';
        echo $str;
    }
}