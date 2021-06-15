<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Putgeo extends BaseController
{
	public function index()
	{
	    $latitude  = $this->request->getVar("latitude");
        $longitude = $this->request->getVar("longitude");

//        $session = \Config\Services::session();
//
//        $arr = [
//            'latitude'=> '55.1846528',
//            'longitude'=>'61.3319979'
//        ];
//
//        $session->set('geoData',$arr);

	}
}
