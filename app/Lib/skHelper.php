<?php namespace App\Lib;
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 2016-02-02
 * Time: 오후 4:03
 */

class SkHelper {

    function __construct()
    {
    }

// 변수이름 반환하는 함수
    static function var_name(&$var, $scope=false, $prefix='unique', $suffix='value')
    {
        if($scope) $vals = $scope;
        else      $vals = $GLOBALS;
        $old = $var;
        $var = $new = $prefix.rand().$suffix;
        $vname = FALSE;
        foreach($vals as $key => $val) {
            if($val === $new) $vname = $key;
        }
        $var = $old;
        return $vname;
    }

    static function p(&$data,$return_data=false){
        //global $member;
        $data_im = print_r($data,true);
        if($return_data!='a')
            $data_im = str_replace( " ","&nbsp;", $data_im);		//$data = str_replace( "\r\n","<br>\r\n", $data);		//$data = str_replace( "\r","<br>\r", $data);		//$data = str_replace( "\n","<br>\n", $data);	//원래 상단에 있던거
        if (!$return_data || $return_data=='a')
            echo "<BR><B>[ ".SKHelper::var_name($data)." ]</B><PRE>$data_im</PRE><BR>";
        else{
            return $data_im;
        }
    }
    // 휴대폰 번호 사이에 '-' 하이픈 넣기 이거써라!
static function tel_html($hp_no){
        if( preg_match("/^[0-9- ]+$/D", $hp_no)){
            $hp_no = preg_replace("/[^0-9]*/s", "", $hp_no);
            $len_hp = strlen($hp_no);
            if( $len_hp < 9 )
                return preg_replace("/([0-9]+)([0-9]{4})/", "$1-$2", $hp_no); //1661-5521
            //else if($len_hp > 14) 국제전화
            else return preg_replace("/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/", "$1-$2-$3", $hp_no);
        }else return $hp_no;
    }
    // 휴대폰 번호만 남기기 이거써라!
static function tel_db($hp_no){
        //return str_replace("-" , "" , $hp_no);
        return preg_replace("/[^0-9]*/s", "", $hp_no);
    }

}
