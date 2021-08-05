<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Model;

class UsedTablesIOS extends BaseController
{
    public function fixTable()
    {

        $tables = new Tablestaff();

        var_dump($this->request->getVar());
//
        foreach ($this->request->getVar("tables") as $key=>$value)
        {

            $arr = [
                'tableNum' => $key,
                'staff_id' => $this->request->getVar("user_id"),
                'place_id' => $this->request->getVar("place_id")
            ];

            if(empty($tables->where('tableNum',$key)->where('place_id',$this->request->getVar("place_id"))->findAll()))
                $tables->insert($arr);
            else
            {
                $arrErr["error"] = "true";
                return $this->response->setJSON($arrErr);
            }
        }

        //   $session->set('setTables',true);
        $arrErr["error"] = "false";
        return $this->response->setJSON($arrErr);

    }

    public function unsetTable()
    {
        $tables = new Tablestaff();
        $order = new Order();



        if(!empty($this->request->getVar("user_id")))
        {
            $date = [
                'status'=>0,
            ];
            $order->update($this->request->getVar("user_id"),$date);
            $tables->where('staff_id', $this->request->getVar("user_id"))->delete();
        }
    }
}
