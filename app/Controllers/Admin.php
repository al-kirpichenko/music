<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\HTTP\RedirectResponse;

class Admin extends BaseController
{
    public function __construct()
    {
        if (session()->get('user_group') !== '2') {
            echo 'Доступ запрещен!';
            exit;
        }
    }
    public function products():string
    {
        $data['title'] = 'Администрирование';
        return view("admin/products", $data);
    }

    public function categories():string
    {
        $data['title'] = 'Администрирование';
        return view("admin/categories", $data);
    }

    public function addProduct(): string
    {
        $data['title'] = 'Администрирование';
        return view("admin/add_product", $data);
    }

    public function addCategory(): string
    {
        $data['title'] = 'Администрирование';
        return view("admin/add_category", $data);
    }

    public function editProduct($id = null): string
    {
        $model = new ProductModel();
        return view('admin/edit_product', ['product' => $model->find($id)]);
    }

    public function editCategory($id = null): string
    {
        $model = new CategoryModel();
        return view('admin/edit_category', ['category' => $model->find($id)]);
    }

    public function saveProduct(): string|RedirectResponse
    {

        $data = [
            'open_date' => $this->request->getPost('open_date'),
            'open_time' => $this->request->getPost('open_time'),
            'closed_date' => $this->request->getPost('closed_date'),
            'closed_time' => $this->request->getPost('closed_time'),
            'status' => $this->request->getPost('status'),
            'initiator' => $this->request->getPost('initiator'),
            'region' => $this->request->getPost('region'),
            'description' => $this->request->getPost('description'),
        ];

        $id = $this->request->getPost('id');

        if ($this->model->where('id', $id)->set($data)->update() === false)
        {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }

        return redirect()->back()->with('success', 'Данные обновлены!');
    }

    public function saveCategory(): string|RedirectResponse
    {

    }
}
