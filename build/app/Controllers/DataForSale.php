<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\HashGen;


class DataForSale extends BaseController
{

    public function index()
    {
        $hashGen = new HashGen();

        $sector = 2832;
        $amount = $this->request->getVar("amount");
        $reference = rand(1, 999999);
        $hashGen->h1($sector . $amount . '643test');


        $signature = $hashGen->signature;

        $data = [
            'sector' => $sector,
            'amount' => $amount,
            'currency' => 643,
            'reference' => $reference,
            'description' => 'Чаевые',
            'signature' => $signature
        ];


        $queryUrl = http_build_query($data);

        $result = file_get_contents("https://test.best2pay.net/webapi/Register?" . $queryUrl);

        $p = xml_parser_create();
        xml_parse_into_struct($p, $result, $vals, $index);
        xml_parser_free($p);

        $idReg = $vals[1]["value"];

        $hashGen->h1($sector . $idReg . 'test');

        $signature = $hashGen->signature;

        $dataSell = [
            'sector' => $sector,
            'id' => $idReg,
            'signature' => $signature
        ];
        $queryUrl = http_build_query($dataSell);

     //   $result = file_get_contents("https://test.best2pay.net/webapi/b2puser/PayInDebit?" . $queryUrl);

        return redirect()->to("https://test.best2pay.net/webapi/b2puser/PayInDebit?" . $queryUrl);


    }
}
