<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Staff;

class Login extends BaseController
{
	public function index()
	{
        return view('login');
	}

}
