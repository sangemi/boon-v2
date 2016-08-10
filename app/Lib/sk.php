<?php namespace App\Lib;
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 2016-02-02
 * Time: 오후 4:03
 */

class sk {
    function __construct()
    {
    }
    public function get($data = [])
    {
        echo "foo";
    }

    // 변수이름 반환하는 함수
    static function var_name(&$var, $scope=false, $prefix='unique', $suffix='value'){
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
            echo "<BR><B>[ ".skHelper::var_name($data)." ]</B><PRE>$data_im</PRE><BR>";
        else{
            return $data_im;
        }
    }

    // 숫자만 남기기. 금액에서 ,빼기
    static function number_only($n) {
        return preg_replace("/[^0-9]*/s", "", $n);
    }
    static function number_format($n) { //,넘어와도 다시
        return number_format(self::number_only($n) );
    }

    // 휴대폰 번호에서 -빼기. 이거써라!
    static function tel_db($hp_no){
        return self::number_only($hp_no);
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

    /* 이름 가운데 숨김 by SK */
    static function hide_kname($str, $tail="*") //
    {
        $len=mb_strlen($str, 'UTF-8');
        if($len==0) {
            return '';
        }else if($len>2){
            return mb_substr($str,0,1, 'UTF-8').str_repeat($tail,$len-2).mb_substr($str,-1,1, 'UTF-8');
        }else
            return mb_substr($str,0,1, 'UTF-8').str_repeat($tail,$len-1);
    }
    /* 끝 x자 숨기기 by SK */
    static function hide_str($str, $hidelen, $tail="*", $limit=2) //limit:앞2글자살림
    {
        $strlen=mb_strwidth($str, 'UTF-8');$cntHan = 0;$cntEng = 0;
        $until = $strlen-$hidelen;

        if($until< $limit)$until=$limit;
        for($i=$strlen-1;$i >= $until ;$i--){
            if(ord($str[$i])>127){$i--;$cntHan++;
            }else $cntEng++;
        }
        $str=mb_substr($str,0,$i+1,"utf-8");
        for($i=0;$i<$cntHan+$cntEng;$i++){
            if(ord($str[$i])==32)$str.=' ';
            else $str.=$tail;
        }

        //$str = mb_strimwidth($str, 0, $until, $tail,"utf-8");
        return $str;
    }
}
