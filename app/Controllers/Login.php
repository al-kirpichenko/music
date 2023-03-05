<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Login extends BaseController
{
    private object $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        if ($this->session->get('loggedIn')) {
            return redirect()->to('/catalog');
        }
        helper(['form']);
        $data['title'] = 'Вход';
        return view('login', $data);
    }

    public function auth(): RedirectResponse
    {
        $model = new UserModel();
        $login = $this->request->getVar('login');
        $password = $this->request->getVar('password');
        $data = $model->where('login', $login)->first();
        if ($data) {

            $verifyPass = password_verify($password, $data->password);
            if ($verifyPass) {
                $sessionData = [
                    'id' => $data->id,
                    'name' => $data->name,
                    'login' => $data->login,
                    'email' => $data->email,
                    'user_group' => $data->user_group,
                    'loggedIn' => TRUE
                ];
                $this->session->set($sessionData);
                return redirect()->to('/catalog');
            }

            $this->session->setFlashdata('msg', 'Неверный пароль!');
            return redirect()->to('/login');
        }

        $this->session->setFlashdata('msg', 'Email не найден!');
        return redirect()->to('/login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}