<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Staff;
use App\Models\Place;
use App\Models\Tablestaff;

class Auth extends BaseController
{

    public function getDate()
    {
        $staff = new Staff();

        $users = $staff->where('login',$this->request->getVar("login"))->where('password',$this->request->getVar("pass"))->findAll();

        if(!empty($users))
        {
            $session = \Config\Services::session();
            $place = new Place();

            $placeId = $place->find($users[0]["place_id"]);

            $session->set('PlaceID',$placeId["id"]);
            $session->set('User',$users);

        }

        return view("account");  //Стоит фильтр Account, если пользователя не существует, его редиректнет на /login

    }


    public function logOut()
    {
        $session = session();
        $session->destroy();
        $tables = new Tablestaff();
        $tables->where('staff_id',$session->get('User')[0]["id"])->delete();
        return redirect()->to("/login");
    }
}
