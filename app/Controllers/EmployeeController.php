<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;


class EmployeeController extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        return view('employee/index');
    }
    public function employeeLogin()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if ($email && $password && $row = $this->UserModel->select('*')->where(['status' => 0, 'is_delete' => 0, 'email' => $email, 'password' => md5($password)])->get()->getRow()) {
            $sessionData = ['us_id' => $row->id, 'userName' => $row->name, 'userEmail' => $row->email, 'userMobile' => $row->mobile, 'companyId' => $row->company_idd, 'companyName' => $row->company_name];
            $this->session->set($sessionData);
            return $this->session->has('us_id') ? redirect()->to(base_url("employee")) : $this->session->setFlashdata('message', 'User is Invalid. Please try again.');
        } else {
            $this->session->setFlashdata('message', 'Invalid email or password format.');
        }
        return view('employee/login');
    }

    public function showProfile()
    {
        return view('employee/profile');
    }

    public function userLogin()
    {
        return view('employee/login');
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
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url("employee-login"));
    }
}
