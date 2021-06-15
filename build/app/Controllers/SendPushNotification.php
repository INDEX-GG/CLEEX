<?php
//require __DIR__ . '/vendor/autoload.php';


namespace App\Controllers;

use App\Models\Staff;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;
use App\Controllers\BaseController;



class SendPushNotification extends BaseController
{
	public function index()
    {
        $staff = new Staff();

        $session = \Config\Services::session();


        $result = $staff->find($session->get('User')[0]["id"]);

        $data = '{"endpoint":"'.$result["endpoint"].'","expirationTime":null,"keys":{"p256dh":"'.$result["publicKey"].'","auth":"'.$result["authToken"].'"},"contentEncoding":"aes128gcm"}';

        $execQuery = [
            "query" => $data,
            'table' => $this->request->getVar("tableNum")
        ];

        $this->response->setJSON($execQuery);

    }
}






