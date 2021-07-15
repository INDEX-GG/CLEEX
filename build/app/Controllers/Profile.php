<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Staff;
use Config\Services;

class Profile extends BaseController
{
    public function profileView()
    {
        return view('profile');

    }


	public function getDate()
	{
		$staff = new Staff();

        $session = session();
        
            $data = $staff->find($session->get('User')[0]["id"]);
            
            $arr["name"] = $data["name"];
            $arr["motto"] = $data["motto"];
            $arr["img"] = 'images/'.$data['photo'];
			$arr["staff_id"] = $session->get('User')[0]["id"];
          //  var_dump(json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
//            exit();
           // return $this->response->setJSON($arr, false);
		return $this->response->setJSON(json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
}
