<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Category;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class Admin extends BaseController
{
    private array $data;

    public function __construct()
    {
        $this->data['title'] = 'Администрирование';
        if (session()->get('user_group') !== '2') {
            echo 'Доступ запрещен!';
            exit;
        }
    }
    public function products(): string
    {
        return view("admin/products", $this->data);
    }

    public function categories(): string
    {
        $model = new CategoryModel();
        $categories = $model
            ->orderBy('id', 'asc')
            ->findAll();
        $this->data['categories'] = $categories;
        return view('admin/categories', $this->data);

    }

    public function addProduct(): string
    {
        return view("admin/add_product", $this->data);
    }

    /**
     * @throws ReflectionException
     */
    public function createProduct(): RedirectResponse
    {
        $model = new ProductModel();

        $data = [
            'name"' => $this->request->getPost('name'),
            'cost' => $this->request->getPost('cost'),
            'category' => $this->request->getPost('category'),
            'image' => $this->request->getPost('image'),
            'description' => $this->request->getPost('description'),
        ];

        if ($model->insert($data) === false)
        {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->back()->with('success', 'Товар успешно добавлен!');
    }


    public function addCategory(): string
    {
        return view("admin/add_category", $this->data);
    }

    /**
     * @throws ReflectionException
     */
    public function createCategory(): RedirectResponse
    {
        $model = new CategoryModel();

        $category = new Category();
        $category->name = $this->request->getPost('name');

        if ($model->insert($category) === false)
        {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->back()->with('success', 'Категория успешно добавлена!');
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

    /**
     * @throws ReflectionException
     */
    public function saveProduct(): RedirectResponse
    {
        $model = new ProductModel();
        $data = [
            'name"' => $this->request->getPost('name'),
            'cost' => $this->request->getPost('cost'),
            'category' => $this->request->getPost('category'),
            'image' => $this->request->getPost('image'),
            'description' => $this->request->getPost('description'),
        ];

        $id = $this->request->getPost('id');

        if ($model->where('id', $id)->set($data)->update() === false)
        {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->back()->with('success', 'Данные обновлены!');
    }

    /**
     * @throws ReflectionException
     */
    public function saveCategory(): RedirectResponse
    {
        $model = new CategoryModel();
        $data = [
            'name"' => $this->request->getPost('name'),
        ];
        $id = $this->request->getPost('id');
        if ($model->where('id', $id)->set($data)->update() === false) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->back()->with('success', 'Данные обновлены!');
    }
}
