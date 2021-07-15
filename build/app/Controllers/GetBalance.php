<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\HashGen;
use App\Models\Requisits;


class GetBalance extends BaseController
{
	public function index()
	{
        $hashGen = new HashGen();
        $requisit = new Requisits();
        $client_ref = $requisit->where('staff_id',2)->findAll()[0]["requisit"];
        $sector = 2832;
        $hashGen->h1($sector.$client_ref.'test');

        $signature = $hashGen->signature;

        $data = [
            'sector' => $sector,
            'client_ref'=> $client_ref,
            'signature' => $signature
        ];

        $queryUrl = http_build_query($data);

        $result = file_get_contents("https://test.best2pay.net/webapi/b2puser/GetBalance?".$queryUrl);

        $p = xml_parser_create();
        xml_parse_into_struct($p, $result, $vals, $index);
        xml_parser_free($p);

    
		$arrRes["balance"] = $vals[3]["value"];
		return $this->response->setJSON($arrRes);
    }
}
