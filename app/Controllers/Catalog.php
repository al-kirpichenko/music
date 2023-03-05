<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Catalog extends BaseController
{
    public function index()
    {
        $data['title'] = 'Каталог';
        return view('catalog',$data);
    }
}
