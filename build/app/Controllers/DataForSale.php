<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\HashGen;
use App\Models\Requisits;
use App\Models\Transaction;

class DataForSale extends BaseController
{

    public function index()
    {
        $hashGen = new HashGen();
        $transaction = new Transaction();
        $requisit = new Requisits();

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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $idReg = $vals[1]["value"];

        $to_client_ref = $requisit->where('staff_id',$this->request->getVar("staff_id"))->findAll()[0]["requisit"];

        $tableData = [
            'staff_id'=> $this->request->getVar("staff_id") ,//тут поменять
            'status'=> true,
            'idZakas'=>$idReg,
            'amount'=>$amount
        ];

        $transaction->insert($tableData);
        //////////////////////////////////////

        //////////////////////////////////////////////////////////


        $hashGen->h1($sector . $idReg . $to_client_ref.'test');

        $signature = $hashGen->signature;




        $dataSell = [
            'sector' => $sector,
            'id' => $idReg,
            'to_client_ref'=>$to_client_ref,
            'signature' => $signature
        ];
        $queryUrl = http_build_query($dataSell);

     //   $result = file_get_contents("https://test.best2pay.net/webapi/b2puser/PayInDebit?" . $queryUrl);



        return redirect()->to("https://test.best2pay.net/webapi/b2puser/PayInDebit?" . $queryUrl);


    }
}
