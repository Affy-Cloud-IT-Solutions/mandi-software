<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SuperAdminController extends BaseController
{
    public function SuperAdminHome()
    {
        return view('super_admin/index');
    }

    public function login()
    {
        return view('login');
    }

    public function createCompany()
    {
        return view('super_admin/create-company');
    }
    public function CompanyList()
    {
        return view('super_admin/company-list');
    }
    public function showProfile()
    {
        return view('super_admin/profile');
    }

}
