<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HashGen extends BaseController
{
    public $signature;

	public function token()
	{
        $token = bin2hex(random_bytes(16));

        $arr = [
            'token'=>$token
        ];

        return $this->response->setJSON($arr);
    }

    public function h1($stringQ)
    {

        $md5Gen = md5($stringQ);

        $str = base64_encode($md5Gen);

        $this->signature = $str;

    }
}
