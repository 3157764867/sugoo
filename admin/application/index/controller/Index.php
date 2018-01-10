<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
    	// echo 1;
        return $this->fetch('index');
    }

   
    
}
