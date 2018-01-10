<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
	// 查询红包数据
    public function getCupon()
    {
        return DB::table('su_cupon')->get()->toArray();
    }

    // 用户注册成功赠送红包
    public function giveCupon($uid)
    {
    	// $uid
    	$data = $this->getCupon();
        $data = json_decode(json_encode($data),true);
        
    	foreach ($data as $k=>$v){
    		if ($v['cn_money'] == 10) {
               $arr['cn_id'] = $v['cn_id'];
               $arr['u_start'] = date('Y-m-d H:i:s');
               $arr['money'] = $v['cn_money'];
               $arr['cu_min'] = 100;
               $arr['u_id'] = $uid;
                $res = DB::table('su_user_cupon')->insert($arr);
                if ($res) {
                   return DB::table('su_cupon')->where('cn_money', 10)->update(array('cu_num' => $v['cu_num']-1));
               }
                }
            
    	}
    	
        
    }

    // 用户红包信息展示
    public function getInfo($uid,$money,$cu_status)
    {
      $data = DB::select('select * from su_cupon  LEFT JOIN su_user_cupon on su_cupon.cn_id=su_user_cupon.cn_id where u_id=1 or money=10 or cu_status=1 or cu_status=0', ['u_id' => $uid,'money'=>$money,'cu_status'=>$cu_status]);

      return json_decode(json_encode($data),true);
    }

    public function getCunum($u_id)
    {
      // 获取红包总数量
        $num = DB::table('su_user_cupon')->where('u_id', $u_id)->count();
        // 获取红包所有值
        $money = DB::select("select SUM(money) from su_user_cupon  WHERE u_id=1");
        // 将对象转换成数组
       $money = json_decode(json_encode($money),true);
       // 赋值
       foreach($money as $k=>$v){
        foreach($v as $key=>$val){
          $money=$val;
        }
       }
        return ['num'=>$num,'money'=>$money];
        
    }

    // 给订单返回的红包数据
    public function getUsercupon($u_id)
    {
       $data = DB::select("select id,u_id,money,cu_min,cu_number from su_cupon  LEFT JOIN su_user_cupon on su_cupon.cn_id=su_user_cupon.cn_id where u_id=$u_id");
       return json_decode(json_encode($data),true);
    }

    // 用户使用红包
    public function useCupon($id,$u_id)
    {
      // 修改对应关系表下的id下得用户红包
    return  DB::select("UPDATE `su_user_cupon` SET `cu_status`='1' WHERE (`id`=$id) and (`u_id`=$u_id)");

      
    }

}
