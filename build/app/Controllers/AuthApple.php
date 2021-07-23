<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Staff;

class AuthApple extends BaseController
{
	public function auth()
	{
        $staff = new Staff();

        $usersLogin = $staff->where('login',$this->request->getVar("login"))->findAll();

        if(!empty($usersLogin))
        {
            $usersPassword =$staff->where('login',$this->request->getVar("login"))->where('password',$this->request->getVar("pass"))->findAll();;
            if(!empty($usersPassword))
            {
                $arrRes = [
                    'idUsers'=>$usersPassword[0]["id"]
                ];
                return $this->response->setJSON($arrRes);
            }
            else
            {
                $arrRes = [
                    'Message'=>'No isset password.'
                ];
                return $this->response->setJSON($arrRes);
            }
        }
        else
        {
            $arrRes = [
                'Message'=>'No isset login.'
            ];
            return $this->response->setJSON($arrRes);
        }
	}
}
