<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EmployeeController extends BaseController
{
    public function index()
    {
        return view('employee/index');
    }

    public function showProfile()
    {
        return view('employee/profile');
    }

    public function login()
    {
        return view('login');
    }

    public function addCustomer()
    {
        return view('employee/add-customer');
    }
    public function addDealer()
    {
        return view('employee/add-dealer');
    }
    public function customerReport()
    {
        return view('employee/customer-reports');
    }
    public function dealerReport()
    {
        return view('employee/dealer-reports');
    }
}
