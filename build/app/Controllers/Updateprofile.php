<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\Staff;
use CodeIgniter\HTTP\Files\UploadedFile;


class Updateprofile extends Controller
{

    public function index()
    {
      //  print_r();

    }


	public function updateProfileDate()
	{

        if (!empty($_FILES))
        {
            $file = $this->request->getFile('imgUs');
            $file->move(  '../public/images/staffPhoto');  //Тут место сохранения картинок
            $name = $file->getName();

            $url = 'staffPhoto/'.$name;
            $this->exec($this->request->getVar('nickname'), $this->request->getVar('motto'),$url);
        }
        else
            $this->exec($this->request->getVar('nickname'), $this->request->getVar('motto'));

	}

	private function exec($name,$motto,$url = null)
    {
        $staff = new Staff();

        $session = session();

        if($url != null)
        {
            $newDate =
                [
                    'name' => $name,
                    'motto' => $motto,
                    'photo' => $url
                ];
        }
        else
            {
            $newDate =
                [
                    'name' => $name,
                    'motto' => $motto,
                ];
        }
        $staff->update($session->get('User')[0]["id"],$newDate);

        return 1;
    }
}
