<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\IncomingRequest;
use Psr\Log\LoggerInterface;
use App\Models\Staff;

class PushSubscription extends BaseController
{
    public function create()
    {
        $subscription = json_decode(file_get_contents('php://input'), true);

        if (!isset($subscription['endpoint'])) {
            echo 'Error: not a subscription';
            return;
        }

        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'POST':
            $staff = new Staff();

            $req = $subscription['endpoint'];

            $session = \Config\Services::session();

            $arr = [
                "endpoint" => ($req),
                "publicKey"=>$subscription['publicKey'],
                "authToken"=>$subscription['authToken']
            ];

            $staff->update($session->get('User')[0]["id"],$arr);

                // create a new subscription entry in your database (endpoint is unique)
                break;
            case 'PUT':
                $staff = new Staff();

                $req = $subscription['endpoint'];

                $session = \Config\Services::session();

                $arr = [
                    "endpoint" => ($req),
                    "publicKey"=>$subscription['publicKey'],
                    "authToken"=>$subscription['authToken']
                ];

                $staff->update($session->get('User')[0]["id"],$arr);
                break;
            case 'DELETE':
                $staff = new Staff();

              //  $req = $subscription['endpoint'];

                $session = \Config\Services::session();

                $arr = [
                    "endpoint" =>null ,
                    "publicKey"=>null,
                    "authToken"=>null
                ];

                $staff->update($session->get('User')[0]["id"],$arr);
                // delete the subscription corresponding to the endpoint
                break;
            default:
                echo "Error: method not handled";
                return;
        }


    }
}
