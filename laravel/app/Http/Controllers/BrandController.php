<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
	public function index()
	{
		view('brand/Brand');
	}
	public function brandList()
	{
		view('brand/BrandList');
	}
}