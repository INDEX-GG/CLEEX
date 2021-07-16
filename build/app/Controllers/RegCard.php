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


            $hashGen->h1($sector.$vals[5]["value"].'test');

            $signature = $hashGen->signature;


            $phoneData = [
                'sector'=>$sector,
                'client_ref'=>$vals[5]["value"],
                'signature'=>$signature
            ];
            $queryUrl = http_build_query($phoneData);

			$arrRes["url"] = "https://test.best2pay.net/webapi/b2puser/SetPhone?".$queryUrl;


			$tableData = [
                'staff_id'=> $this->request->getVar("staff_id"),
                'requisit'=>$vals[5]["value"]
            ];

            $requisit->insert($tableData);
			return $this->response->setJSON($arrRes) ;


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
