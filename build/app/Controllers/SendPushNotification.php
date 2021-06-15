<?php
//require __DIR__ . '/vendor/autoload.php';


namespace App\Controllers;

use App\Models\Staff;
use App\Models\Tablestaff;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;
use App\Controllers\BaseController;



class SendPushNotification extends BaseController
{
	public function index()
    {
        $session = \Config\Services::session();
        $staff = new Staff();
        $tables = new Tablestaff();

        $result = $tables->where('tableNum',$this->request->getVar("table"))->findAll();

        $resultOff = $staff->find($result[0]["staff_id"]); 

        $data = '{"endpoint":"'.$resultOff["endpoint"].'","expirationTime":null,"keys":{"p256dh":"'.$resultOff["publicKey"].'","auth":"'.$resultOff["authToken"].'"},"contentEncoding":"aes128gcm"}';

        $execQuery["query"] = $data;
        $execQuery["table"] = $this->request->getVar("table");
     
      
        return $this->response->setJSON($execQuery);
    }
}






