<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barman extends BaseController
{
	public function index()
	{
		return view('barman');
	}
}
