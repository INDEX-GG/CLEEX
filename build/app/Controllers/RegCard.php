<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Requisits;
use App\Models\Transaction;

class RegCard extends BaseController
{
	public function index()
	{
        $hashGen = new HashGen();

        $requisit = new Requisits();


        if(empty($requisit->where('staff_id',$this->request->getVar("staff_id"))->findAll()))
        {

            $sector = 2832;

//

            $first_name = $this->request->getVar("first_name");
            $patronymic = $this->request->getVar("patronymic");
            $last_name  =$this->request->getVar('last_name');


            $birth_date_box = explode('-',$this->request->getVar('birth_date'));
			$birth_date = $birth_date_box[0].'.'.$birth_date_box[1].'.'.$birth_date_box[2];

            $address = $this->request->getVar('address');
            $email = $this->request->getVar('email');

            $hashGen->h1($sector .$first_name. $patronymic.$last_name.$birth_date.$address.$email.'test');

            $signature = $hashGen->signature;

            $data = [
                'sector' => $sector,
                'first_name'=>$first_name,
                'patronymic'=>$patronymic,
                'last_name' => $last_name,
                'birth_date'=>$birth_date,
                'address' => $address,
                'email'=>$email,
                'signature' => $signature
            ];


            $queryUrl = http_build_query($data);
	
            $result = file_get_contents("https://test.best2pay.net/webapi/b2puser/Register?" . $queryUrl);


            $p = xml_parser_create();
            xml_parse_into_struct($p, $result, $vals, $index);
            xml_parser_free($p);




////////Подтверждение номера.

            $client_ref = $vals[5]["value"];
        //    $client_ref = '5d9f34fb-9c25-48bf-9cc3-edf6f38f575b';
            $hashGen->h1($sector.$client_ref.'test');

            $signature = $hashGen->signature;


            $phoneData = [
                'sector'=>$sector,
                'client_ref'=>$client_ref,
                'signature'=>$signature
            ];
            $queryUrl = http_build_query($phoneData);

           return redirect()->to("https://test.best2pay.net/webapi/b2puser/SetPhone?".$queryUrl);

        }
        else
        {
            $arrRes["status"] = "isset";
            return $this->response->setJSON($arrRes);
        }
	}


	public function getView()
	{
		return view('regCard');
	}
}
