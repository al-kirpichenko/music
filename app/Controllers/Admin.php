<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Category;
use App\Entities\Product;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

class Admin extends BaseController
{
    private array $data;
    private CategoryModel $categoryModel;
    private array $categories;

    public function __construct()
    {
        $this->data['title'] = 'Администрирование';
        $this->categoryModel = new CategoryModel();
        $this->data['categories'] = $this->categoryModel
            ->orderBy('id', 'asc')
            ->findAll();

        if (session()->get('user_group') !== '2') {
            echo 'Доступ запрещен!';
            exit;
        }
    }
    public function products(): string
    {
        $model = new ProductModel();
        $products = $model
            ->orderBy('id', 'asc')
            ->findAll();
        $this->data['products'] = $products;
        return view("admin/products", $this->data);
    }

    public function categories(): string
    {
        return view('admin/categories', $this->data);
    }

    public function addProduct(): string
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel
            ->orderBy('id', 'asc')
            ->findAll();
        $this->data['categories'] = $categories;

        return view("admin/add_product", $this->data);
    }

    /**
     * @throws ReflectionException
     */
    public function createProduct(): string|RedirectResponse
    {
        $model = new ProductModel();

        $rules =[
            'upload' => [
                'rules' => 'uploaded[upload]|max_size[upload,1024]|is_image[upload]',
                'label' => 'upload',
            ]
        ];
        if($this->validate($rules)) {

        $uploadedFile = $this->request->getFile('upload');

        $path = $uploadedFile->store();

        $filepath = WRITEPATH . $path;

        $file = new File($filepath);



        $dataProduct = $this->request->getPost();
            $dataProduct['image'] = $path;


            $product = new Product();
            $product->fill($dataProduct);

            if ($model->insert($product) === false) {
                return redirect()->back()->withInput()->with('errors', $model->errors());
            }

            return redirect()->back()->with('success', 'Товар успешно добавлен!');
        }

        $this->data['validation'] = $this->validator;

        return view("admin/add_product", $this->data);
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
        $dataCategory = $this->request->getPost();

        $category = new Category();
        $category->fill($dataCategory);

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
        $this->data['category'] = $model->find($id);
        return view('admin/edit_category', $this->data);
    }

    /**
     * @throws ReflectionException
     */
    public function saveProduct(): RedirectResponse
    {
        $model = new ProductModel();
        $dataProduct = $this->request->getPost();

        $product = new Product();
        $product->fill($dataProduct);

        if ($model->where('id', $product->id)->set($dataProduct)->update() === false)
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
        $dataCategory = $this->request->getPost();

        $category = new Category();
        $category->fill($dataCategory);

        if ($model->where('id', $category->id)->set($dataCategory)->update() === false) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->back()->with('success', 'Данные обновлены!');
    }

    public function removeCategory(int $id = null): RedirectResponse
    {
        $model = new CategoryModel();

        if ($model->delete($id) === false) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
        return redirect()->back()->with('success', 'Категория удалена!');
    }

    public function removeProduct(int $id = null): RedirectResponse
    {
        $model = new ProductModel();
        if ($model->delete($id) === false) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
        return redirect()->back()->with('success', 'Товар удален!');
    }
}
