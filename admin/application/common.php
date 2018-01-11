<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function category($arr,$p_id=0,$level=0)
	{
		//定义一个静态变量，存储一个空数组，用静态变量，是因为静态变量不会被销毁，会保存之前保留的值，普通变量在函数结束时，会死亡，生长周期函数开始到函数结束，再次调用重新开始生长
		//保存一个空数组
		static $list = array();
		$l='';
        for($i=0;$i<$level;$i++){
            $l.='-';
        }
		//通过遍历查找是否属于顶级父类，pid=0为顶级父类
		foreach ($arr as $k => $v) 
		{
			//进行判断如果pid=0，那么为顶级父类，放入定义的空数组里
			if ($v['p_id'] == $p_id) 
			{
				$level++;
                $list[$k]['c_name']=$l.$v['c_name'];
                $list[$k]['c_id']=$v['c_id'];
                unset($arr[$k]);
				category($arr,$v['c_id'],$level+1);
			}
		}
		return $list;//递归出口
	}
if ( ! function_exists('cut_string')){
    function cut_string($str, $limit = 100, $end_char = '...'){
        if (extension_loaded('mbstring') == TRUE){//开启了mbstring
            if(mb_strlen($str) > $limit){
                return mb_substr($str, 0, $limit).$end_char;
            } else {
                return $str;
            }
        }

        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $str, $t_string);
        if(count($t_string[0]) > $limit) return join('', array_slice($t_string[0], 0, $limit)).$end_char;
        return join('', array_slice($t_string[0], 0, $limit));
    }
}

if ( ! function_exists('digui')) {
    function digui($aa)
    {
        $array = $aa;
        if (!is_array($array)) {
            return FALSE;
        } else {
            $returnArray = array();
            $num = count($array);
            if ($num == 1) {
                return $array;
            } else {
                $temp = array();
                for ($n = 0; $n < count($array[0]); $n++) {
                    for ($m = 0; $m < count($array[1]); $m++) {
                        $temp[] = $array[0][$n] . '_' . $array[1][$m];
                    }
                }

                $array[0] = $temp;
                unset($array[1]);
                $a = count($array);
                if ($a == 1) {
                    return $array;
                } else {
                    foreach ($array as $v) {
                        $returnArray[] = $v;
                    }
                    return digui($returnArray);
                }
            }
        }
    }
}


function sum($v){
    $sum = $v;
    $v++;
    if ($v < 4){
        return sum($v);
    }
    return $sum;
}
