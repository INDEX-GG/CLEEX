<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Requisits;


class OutBabki extends BaseController
{
	public function index()
	{
        $hashGen = new HashGen();
        $requisit = new Requisits();


        $sector = 2832;
        $from_client_ref = $requisit->where('staff_id',$this->request->getVar("staff_id"))->findAll()[0]["requisit"];
        $amount = $this->request->getVar("superbabki");

        $hashGen->h1($sector .$from_client_ref. $amount . '643test');


        $signature = $hashGen->signature;

        $data = [
            'sector' => $sector,
            'from_client_ref' => $from_client_ref,
            'amount' => $amount,
            'currency' => 643,
            'description' => 'Вывод заработаных чаевых.',
            'signature' => $signature
        ];


        $queryUrl = http_build_query($data);

       // echo "https://test.best2pay.net/webapi/b2puser/PayOut?" . $queryUrl;
	   $arrRes["url"] = "https://test.best2pay.net/webapi/b2puser/PayOut?" . $queryUrl;
	   return $this->response->setJSON($arrRes);
       //return redirect()->to("https://test.best2pay.net/webapi/b2puser/PayOut?" . $queryUrl);
	}
}
