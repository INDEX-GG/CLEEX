<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Model;

class TablesIOS extends BaseController
{
	public function index()
	{
        $place = new Place();


        $tables = new Tablestaff();

        $result = ($place->find($this->request->getVar("place_id")));

        $busyTables = $tables->where('place_id',$this->request->getVar("place_id"))->findColumn('tableNum');
        $selfTables = $tables->where('staff_id',$this->request->getVar("user_id"))->findColumn('tableNum');

        $arr["selfTables"] = $selfTables;
        $arr["count"] =  $result["tables"];
        $arr["busy"] = $busyTables;

        return $this->response->setJSON($arr);
	}
}
