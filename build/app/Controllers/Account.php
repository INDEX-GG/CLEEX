<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Order;

class Account extends BaseController
{
	public function index()
	{
	    $session = session();
	    $order = new Order();

	    $result = $order->where('staff_id',$session->get('User')[0]["id"])->where('status',1)->findAll();

	    return view('account');


		//return view('account');
	}

	public function busyTables()
    {
        $session = session();
        $order = new Order();
        $result = $order->where('staff_id',$session->get('User')[0]["id"])->where('status',1)->findColumn('tableNum');
        $arr["tables"] = $result;
        return $this->response->setJSON($arr);
    }
}
