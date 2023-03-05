<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Register extends BaseController
{
    public function index():string
    {
        helper(['form']);
        $data['title'] = 'Регистрация';
        return view('register', $data);
    }

    public function save(): string|RedirectResponse
    {
        $data['title'] = 'Регистрация';
        helper(['form']);
        $rules = [
            'name'          => 'required|regex_match[/^[а-яёА-ЯЁ -]+$/u]',
            'surname'       => 'required|regex_match[/^[а-яёА-ЯЁ -]+$/u]',
            'login'         => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'password_repeat ' => 'required|matches[password]',
        ];
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'name'    => $this->request->getVar('name'),
                'surname'    => $this->request->getVar('surname'),
                'patronymic'    => $this->request->getVar('patronymic'),
                'login'    => $this->request->getVar('login'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            try {
                $model->save($data);
            } catch (\ReflectionException $e) {}
            return redirect()->to('/catalog');
        }
        $data['validation'] = $this->validator;
        return view('register', $data);
    }
}
