<?php

namespace app\index\controller;

use think\Controller;

use think\Request;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;

class Brand extends Controller{

	// 列表
	public function index()
	{
		$brand = model('brand');
		$arr = $brand->brandList();
		return $this->fetch('brand',['arr' => $arr]);
	}
	//品牌添加
	public function add()
	{
		// echo 1;
		return $this->fetch('addbrand');
	}
	public function brandAdd()
    {
        if(request()->isPost())
        {
            $file = request()->file('b_logo');
            // 要上传图片的本地路径
            $filePath = $file->getRealPath();
            //后缀
            $ext = pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);
            // 上传到七牛后保存的文件名
            $key =substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
            require_once VENDOR_PATH . 'qiniu/php-sdk/autoload.php';
            // 需要填写你的 Access Key 和 Secret Key
            $accessKey = 'xZHAtberHTHfti3ZBsSBqG4jMbjqo7nit9wgpw-v';
            $secretKey = 'EoS94CI0o3h0HOtfyBWHmFqTSNdyN9BMZDGFsnxq';
            // 构建鉴权对象
            $auth = new Auth($accessKey, $secretKey);
            // 要上传的空间
            $bucket = 'tnwqiniu';
            $domain = 'p1vigyie1.bkt.clouddn.com';
            $token = $auth->uploadToken($bucket);
            // 初始化 UploadManager 对象并进行文件的上传
            $uploadMgr = new UploadManager();
            // 调用 UploadManager 的 putFile 方法进行文件的上传
            $res = list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
            if ($err !== null) 
            {
            	
                return ["err"=>1,"msg"=>$err,"data"=>""];
            } 
            else 
            {
            	$data['b_name'] = input('b_name');
				$data['b_desc'] = input('b_desc');
                //返回图片的完整URL
                $data['b_logo'] = $this->download($ret['key']);
				$brand = model('brand');
				$arr = $brand->addBrand($data);
				if ($arr) 
	            {
	            	$this->success('添加成功','brand/index');
	            }
	            else
	            {
	            	$this->error('添加失败','brand/add');
	            }
                
            }
        }
    }
    //七牛云
    /**
     * 图片下载
     * @return String 图片的完整URL
     */
    private function download($key)
    {
        // 需要填写你的 Access Key 和 Secret Key
        $accessKey = 'xZHAtberHTHfti3ZBsSBqG4jMbjqo7nit9wgpw-v';
        $secretKey = 'EoS94CI0o3h0HOtfyBWHmFqTSNdyN9BMZDGFsnxq';
        $domain = 'p1vigyie1.bkt.clouddn.com';
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);
        //baseUrl构造成私有空间的域名/key的形式
        $baseUrl = 'http://'.$domain.'/'.$key;
        $authUrl = $auth->privateDownloadUrl($baseUrl);
        return $authUrl;
    }
	//品牌删除
	public function delete()
	{
		$id = input('id');
		$brand = model('brand');
		$arr = $brand->del($id);
		if ($arr) 
		{
			$this->success('删除成功','brand/index');
		}
		else
		{
			$this->error('删除失败','brand/index');
		}
	}
	public function update()
	{
		$id = input('id');
		$brand = model('brand');
		$arr = $brand->brandFind($id);
		return $this->fetch('brand_set',['arr' => $arr]);
	}
	public function brandSave()
	{
		$id = input('id');
		$data['b_name'] = input('b_name');
		$data['b_desc'] = input('b_desc');
		$brand = model('brand');
	    $arr = $brand->brandUpdate($data,$id);
	    if ($arr) 
	    {
	        $this->success('修改成功','brand/index');
	    }
	    else
	    {
	        $this->error('修改失败','brand/update');
	    }
	}

}