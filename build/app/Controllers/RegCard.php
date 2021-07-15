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

            $hashGen->h1($sector . 'test');
            $signature = $hashGen->signature;

            $data = [
                'sector' => $sector,
                'signature' => $signature
            ];


            $queryUrl = http_build_query($data);

            //$result = file_get_contents("https://test.best2pay.net/webapi/b2puser/Register?" . $queryUrl);

            echo "https://test.best2pay.net/webapi/b2puser/Register?" . $queryUrl;

//            $p = xml_parser_create();
//            xml_parse_into_struct($p, $result, $vals, $index);
//            xml_parser_free($p);



//            $tableData = [
//                'staff_id'=> $this->request->getVar("staff_id"),
//                'requisit'=>$vals[5]["value"]
//            ];

         //   $requisit->insert($tableData);
            $arrRes["status"] = "success";
            return $this->response->setJSON($arrRes);
        }
        else
        {
            $arrRes["status"] = "isset";
            return $this->response->setJSON($arrRes);
        }
	}
}
