<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Image extends Model
{
	public function addimage($data)
	{
		return $arr = Db::table('su_photo')->insert($data);
	}
	public function imageList()
	{
		return $arr = Db::table('su_photo')->select();
	}
	public function imageDel($id)
	{
		return $arr = Db::table('su_photo')->where('photo_id',$id)->delete();
	}
	public function imageFind($id)
	{
		return $arr = Db::table('su_photo')->where('photo_id',$id)->find();
	}
	public function imgUpdate($id,$data)
	{
		return $arr = Db::table('su_photo')->where('photo_id',$id)->update($data);
	}
}