<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Model;

class UpdateProfileIOS extends BaseController
{
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
        $staff->update($this->request->getVar("user_id"),$newDate);

        return 1;
    }
}
