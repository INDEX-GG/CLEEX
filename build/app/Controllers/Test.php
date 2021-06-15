<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Test extends BaseController
{
	public function index()
	{
        $data['title'] = 'О сайте / Контакты';
        $data['header'] = 'Связаться с нами';
		exit('Прибыли на тестовую страницу для работы.');
	}
}
