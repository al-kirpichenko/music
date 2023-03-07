<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Catalog extends BaseController
{

    private array $data;

    public function __construct()
    {
        $this->data['title'] = 'Каталог';
    }

    public function index(): string
    {
        $model = new ProductModel();
        $this->data['products'] = $model
            ->orderBy('id', 'asc')
            ->findAll();
        return view('catalog',$this->data);
    }
}
