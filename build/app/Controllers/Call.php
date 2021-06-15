<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tablestaff;
use App\Models\Staff;
use App\Models\Order;
//use function MongoDB\BSON\toCanonicalExtendedJSON;

class Call extends BaseController
{
	public function find()
	{
      
        $tables = new Tablestaff();

        $result = $tables->where( 'tableNum',$this->request->getVar("table"))->findAll();

        if(empty($result))  // ну если в таблице пусто, тут разговор короткий
            return;

        $staff = new Staff();
        $order = new Order();

        $resultOff = $staff->find($result[0]["staff_id"]); // находим по id данные об официанте

        $tableNum = $this->request->getVar("table"); // данные из запроса

        date_default_timezone_set('Etc/GMT-5'); // устанавливаем часовой пояс

        $arr = [
            'tableNum'=>(int)($tableNum),
            'status'=>true,
            'time'=>date("Y-m-d H:i:s"),
            'staff_id'=>$result[0]["staff_id"],
            'place_id'=>1
        ];

////Тут проверка, если в таблице order_staff нету записей, то добавляем иначе возвращаем ошибку
        if(empty($order->where('tableNum',$this->request->getVar("table"))->where('status',1)->findAll()))
        {
            $order->insert($arr);

            $session = \Config\Services::session();
            $session->set('idStaff',$result[0]["staff_id"]);

           // $this->sendPush($this->request->getVar("table"));

           $res = $staff->find($session->get('User')[0]["id"]);
           $answer =[
               'error' => false,
               'push_token'=>$res["push_token"],
               'name'=>$resultOff["name"],
           ];
         //  var_dump($answer);
           return $this->response->setJSON($answer);
        }
        else  // тут формируем сообщение об ошибке, если вызов уже был совершен
        {
                $error["error"] = true;
                $error["name"] = $resultOff["name"];
                $error["motto"] = $resultOff["motto"];
                $error["img"] = $resultOff['photo'];
                return $this->response->setJSON($error);
        }

	}

	public function sendPush($title)
    {
        $session = \Config\Services::session();
        $staff = new Staff();
        $res = $staff->find($session->get('User')[0]["id"]);

        $url = "https://fcm.googleapis.com/fcm/send";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Authorization: key=AAAAWakNnGw:APA91bGx7xjKQV4XReJSfglbqwQfp_N3W4IbRu4jGIQU0KazUHo2YDRxRzOywEr9Yaue7PUgYAgdwrYgXOWAoXUT5zcsw-gO5XEqEoMxsOa91GH82wGytFI2Nlg0PIGobtKAuTLJSjl0",
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = <<<DATA
            {
              "notification": {
                    "title": "Новый заказ на стол: {$title}",
                    "body": "Нажмите на это уведомление, чтобы перейти в профиль.",
                    "icon": "/itwonders-web-logo.png",
                    "click_action": "https://cleex.ru/account"
                },
              "to": "{$res["push_token"]}"
            }
            DATA;

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        return $res["push_token"];
    }

}
