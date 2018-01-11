<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\Category;

use think\Request;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
use think\Session;

class Image extends Controller
{
	public function index()
	{
		$image = model('image');
		$arr = $image->imageList(); 
		return $this->fetch('image',['arr' => $arr]);
	}
	public function add()
	{
		$g_id = input('id');
		return $this->fetch('image_add',['g_id' => $g_id]);
	}

	public function delete()
	{
		$id = input('id');
		$image = model('image');
		$arr = $image->imageDel($id);
		if ($arr) 
		{
			$this->success('删除成功','image/index');
		}
		else
		{
			$this->error('删除失败','image/index');
		}
	}

 	public function upload()
    {
        if(request()->isPost())
        {
            $file = request()->file('photo_url');
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
            	$data['g_id'] = input('id');
				$data['photo_type'] = input('photo_type');
                //返回图片的完整URL
                $data['photo_url'] = $this->download($ret['key']);
				$image = model('image');
				$bool = $image->addimage($data);
				if ($bool) 
	            {
	            	$this->success('添加成功','image/index');
	            }
	            else
	            {
	            	$this->error('添加失败','image/add');
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

}