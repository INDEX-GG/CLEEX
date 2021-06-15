<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Place;
use App\Models\Tablestaff;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Order;

class Usedtables extends BaseController
{
	public function fixTable()
	{

	    $tables = new Tablestaff();
        $session = session();
        var_dump($this->request->getVar());
//
        foreach ($this->request->getVar() as $key=>$value)
        {

            $arr = [
                'tableNum' => $key,
                'staff_id' => $session->get('User')[0]["id"],
                'place_id' => $session->get('PlaceID')
            ];

            if(empty($tables->where('tableNum',$key)->where('place_id',$session->get('PlaceID'))->findAll()))
                $tables->insert($arr);
            else
            {
                $arrErr["error"] = "true";
                return $this->response->setJSON($arrErr);
            }
        }

     //   $session->set('setTables',true);
        $arrErr["error"] = "false";
        return $this->response->setJSON($arrErr);

	}

	public function unsetTable()
    {
        $tables = new Tablestaff();
        $order = new Order();

        $session = session();

        if(!empty($session->get('User')[0]["id"]))
        {
            $date = [
                'status'=>0,
            ];
            $order->update($session->get('User')[0]["id"],$date);
            $tables->where('staff_id', $session->get('User')[0]["id"])->delete();
        }
    }
}
