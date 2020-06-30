<?php
namespace app\Controllers;
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
    public function dianyingTypeAll($type){
        $url='https://www.360kan.com/dianying/list';
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
//        $part2=array_chunk(array_merge($part1[1],$part1[2]),15);
//        $this->dd($typeData);
//        echo $this->reposeJson('200','success',$arr);
    }
    function reposeJson($code,$msg,$data){
        $respose=[
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ];
        return json_encode($respose,JSON_UNESCAPED_UNICODE);
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