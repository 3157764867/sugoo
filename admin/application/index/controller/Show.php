<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\File;
use think\DB;
use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;


class Show extends Controller
{
    public function index()
    {
    	$page=Request::instance()->get('page');
    	//检测
    	$page=isset($page)?$page:1;
    	//总条数
    	$total=model('show')->gettotal($where=1);
    	//每页显示
    	$pagenum=5;
    	//总页数
    	$totalpage=ceil($total/$pagenum);
    	//偏移量
    	$start=($page-1)*$pagenum;
    	//上一页 下一页
    	$last=$page-1<1?1:$page-1;
		$next=$page+1>=$totalpage?$totalpage:$page+1;
		$str='';
		$str.="<a href='javascript:void(0)' onclick='page(1)'>首页</a>&nbsp;";
		$str.="<a href='javascript:void(0)' onclick='page($last)'>上一页</a>&nbsp;";
		$str.="<a href='javascript:void(0)' onclick='page($next)'>下一页</a>&nbsp;";
		$str.="<a href='javascript:void(0)' onclick='page($totalpage)'>尾页</a>";
    	$data=model('show')->getinfo($start,$pagenum);
        return $this->fetch('show',['data'=>$data,'num'=>$total,'page'=>$str,'totalpage'=>$totalpage]);
    }
    Public function add()
    {
    	return $this->fetch('add_img');
    }
    //添加
    public function add_show()
    {
    	$file=Request()->file('image');
    	$data['show_name']=Request::instance()->post('show_name');
    	$data['show_link']=Request::instance()->post('show_link');
    	$info=$file->validate(['size'=>1567800,'ext'=>'jpg,png,gif'])->move(ROOT_PATH.'public/uploads');
    	if($info)
    	{
    		$data['img']=$info->getSaveName();
    		$data['addtime']=date('Y-m-d H:i:s');
    		$res=model('show')->add_image($data);
    		if($res)
    		{
    			return $this->redirect('show/index');
    		}
    		else
    		{
    			return $this->fetch('add_img');
    		}
    	}
    }
    Public function up()
    {
    	$id=Request::instance()->get('id');
    	$data=model('show')->getone($id);
    	return $this->fetch('up',['data'=>$data]);
    }
    //修改
    public function up_show()
    {
    	if(Request()->isPost())
    	{
    		$data=input('post.');
    		$file=Request()->file('image');
    		if(empty($file))
    		{
    			$data['img']='';
    		}
    		else
    		{
    			$info=$file->validate(['size'=>1567800,'ext'=>'jpg,png,gif'])->move(ROOT_PATH.'public/uploads');
    			if($info)
    			{
    				$data['img']=$info->getSaveName();
    			}
    		}
    		$res=model('show')->do_up($data);
			if($res)
			{
				return $this->redirect('show/index');
			}
    	}
    }
    //删除
    public function del()
    {
    	$id=Request::instance()->get('id');
    	$res=model('show')->del($id);
    	return json_encode($res);
    }
     //七牛云
    /**
     * 图片上传
     * @return String 图片的完整URL
     */
    public function upload()
    {
        if(request()->isPost())
        {
            $data['show_name']=Request::instance()->post('show_name');
            $data['show_link']=Request::instance()->post('show_link');
            $file=request()->file('image');
            // 要上传图片的本地路径
            $filePath = $file->getRealPath();
            //后缀
            $ext=pathinfo($file->getInfo('name'),PATHINFO_EXTENSION);
            //上传到七牛云保存的文件名
            $key=substr(md5($file->getRealPath()),0,5).date('YmdHis').rand(0,999).'.'.$ext;
            require_once VENDOR_PATH . 'qiniu/php-sdk/autoload.php';
            // 需要填写你的 Access Key 和 Secret Key
            $accessKey = 'H6fVjV3_PvmfFAokqKnRFWweG2GO2wYMJssEkotn';
            $secretKey = 'ksSSLTXoO6iAiaZ0iY83n-EQyMqzM2YspQJB8sDO';
            //构建鉴权对象
            $auth=new Auth($accessKey,$secretKey);
            //要上传的空间
            $bucket = 'wwww';
            $domain = 'p2d7ud14u.bkt.clouddn.com';
            $token = $auth->uploadToken($bucket);
            // 初始化 UploadManager 对象并进行文件的上传
            $uploadMgr = new UploadManager();
            // 调用 UploadManager 的 putFile 方法进行文件的上传
            list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
            if($err!==null)
            {
                return ['err'=>1,'msg'=>$err,'data'=>""];
            }
            else
            {
                // return json(['err'=>0,"msg"=>'上传完成',"data"=>$this->download($ret['key'])]);
                $data['img']=$this->download($ret['key']);
                $data['addtime']=date('Y-m-d H:i:s');
                $res=model('show')->add_image($data);
                if($res)
                {
                    return $this->redirect('show/index');
                }
                else
                {
                    return $this->fetch('add_img');
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
            $accessKey = 'H6fVjV3_PvmfFAokqKnRFWweG2GO2wYMJssEkotn';
            $secretKey = 'ksSSLTXoO6iAiaZ0iY83n-EQyMqzM2YspQJB8sDO';
            $domain = 'p2d7ud14u.bkt.clouddn.com';
            // 构建鉴权对象
            $auth = new Auth($accessKey, $secretKey);
            //baseUrl构造成私有空间的域名/key的形式
            $baseUrl = 'http://'.$domain.'/'.$key;
            $authUrl = $auth->privateDownloadUrl($baseUrl);
            return $authUrl;
    }
}
