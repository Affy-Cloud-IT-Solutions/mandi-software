<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;


class EmployeeController extends BaseController
{
    protected $UserModel;
    protected $CustomerModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->CustomerModel = new CustomerModel();
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
            return $this->session->has('us_id') ? redirect()->to(base_url("employee")) : $this->session->setFlashdata('success', 'User is Invalid. Please try again.');
        } else {
            $this->session->setFlashdata('error', 'Invalid email or password format.');
        }
        return view('employee/login');
    }

    public function showProfile()
    {
        return view('employee/profile');
    }

    // public function userLogin()
    // {
    //     return view('employee/login');
    // }

    public function addCustomer()
    {
        return view('employee/add-customer');
    }

    public function saveCustomer()
    {

        $company_idd = $_SESSION['companyId'];
        $dataKeyValue = [
            'customerName' => $_POST['name'],
            'phone' => $_POST['mobile'],
            'date' => date('Y-m-d H:i:s'),
            'company_idd' => $company_idd,
        ];

        $dataInsert =  $this->CustomerModel->insert($dataKeyValue);

        if ($dataInsert) {
            $this->session->setFlashdata('success', 'Customer Successfully Insert');
            return redirect()->to(base_url("employee/add-customer"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("employee/add-customer"));
        }
    }

    public function selectCustomer()
    {
        $customerModel = new CustomerModel();
        $customers = $customerModel->findAll(); // Fetch all customers

        return view('employee/select-customer', ['customers' => $customers]);
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
