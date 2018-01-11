<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
    	$data=DB::table('su_hdp')->get();
    	$data=json_decode($data,true);
    	return view('index.index',['data'=>$data]);
    }
}
