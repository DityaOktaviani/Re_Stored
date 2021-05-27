<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
	public function index()
	{
		echo view('admin/blank');
	}

}
