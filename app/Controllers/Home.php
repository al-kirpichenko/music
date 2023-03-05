<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Music House';
        return view('home',$data);
    }

    public function about()
    {
        $data['title'] = 'О нас';
        return view('about',$data);
    }

    public function map()
    {
        $data['title'] = 'Карта';
        return view('map',$data);
    }
}
