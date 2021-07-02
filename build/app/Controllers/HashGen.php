<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HashGen extends BaseController
{
	public function token()
	{
        $token = bin2hex(random_bytes(16));

        $arr = [
            'token'=>$token
        ];

        return $this->response->setJSON($arr);
    }

    public function h1()
    {
        $data = $this->request->getVar("data");
       $key  = $this->request->getVar("token");


        $str = hash_hmac("sha1", $data, $key,false);

        $arr = [
            'result'=>$str
        ];

        return $this->response->setJSON($arr);
    }
}
