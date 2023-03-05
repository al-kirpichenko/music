<?php

namespace App\Filters;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null): RedirectResponse|null
    {
        if(! session()->get('loggedIn')){
            return redirect()->to('/');
        }
        return null;
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}