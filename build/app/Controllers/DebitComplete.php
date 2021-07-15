<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\HashGen;
use App\Models\Transaction;
use App\Models\Requisits;

class DebitComplete extends BaseController
{
	public function index()
	{
        $hashGen = new HashGen();
        $transaction = new Transaction();
        $requisit = new Requisits();


        $idArr = $transaction->where('staff_id',1)->where('status',true)->findAll();

        $client_ref = $requisit->where('staff_id',2)->findAll()[0]["requisit"];

        foreach ($idArr as $item)
        {
            //$client_ref = "95c64500-5def-404e-8f86-4892eed8ee3e";

            $sector = 2832;
            $amount = $item["amount"];

            $hashGen->h1($sector . $item["idZakas"] . $amount . '643' . $client_ref . 'test');


            $signature = $hashGen->signature;

            $data = [
                'sector' => $sector,
                'id' => $item["idZakas"],
                'amount' => $amount,
                'currency' => 643,
                'client_ref' => $client_ref,
                'signature' => $signature
            ];

            $queryUrl = http_build_query($data);

         //   $result = file_get_contents("https://test.best2pay.net/webapi/b2puser/Complete?" . $queryUrl);
//
           // print_r($result);
        }
	}
}
