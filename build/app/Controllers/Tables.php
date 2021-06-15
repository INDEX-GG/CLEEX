<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Place;
use App\Models\Tablestaff;

class Tables extends BaseController
{
	public function pageTable()
	{
//	     $place = new Place();
//         $session = \Config\Services::session();
//	     $result = ($place->find($session->get("PlaceID")));   //Получаем столы для заведения, тк я хз куда в js вставлять их, вставил их в meta

	     return view('tables');
	}

	public function CountTables()
    {
        $place = new Place();
        $session = session();

        $tables = new Tablestaff();

        $result = ($place->find($session->get("PlaceID")));

        $busyTables = $tables->where('place_id',$session->get("PlaceID"))->findColumn('tableNum');
        $selfTables = $tables->where('staff_id',$session->get('User')[0]["id"])->findColumn('tableNum');

        $arr["selfTables"] = $selfTables;
        $arr["count"] =  $result["tables"];
        $arr["busy"] = $busyTables;

        return $this->response->setJSON($arr);
    }


}
