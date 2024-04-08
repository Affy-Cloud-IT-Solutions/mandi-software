<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;


class CompanyController extends BaseController
{
    protected $CustomerModel;

    public function index()
    {
        return view('company/index');
    }

    public function login()
    {
        return view('login');
    }

    public function showProfile()
    {
        return view('company/profile');
    }

    // CRATES
    public function addCrate()
    {
        return view('company/add-crate');
    }

    public function crateList()
    {
        return view('company/crate-list');
    }

    //CUTOMERS
    public function addCustomer()
    {
        return view('company/add-customer');
    }

    public function customerList()
    {
        return view('company/customer-list');
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

    //DEALERS
    public function addDealer()
    {
        return view('company/add-dealer');
    }

    public function dealerList()
    {
        return view('company/dealer-list');
    }

    //USERS
    public function addUser()
    {
        return view('company/add-user');
    }

    public function userList()
    {
        return view('company/user-list');
    }

    //REPORTS
    public function showCrate()
    {
        return view('company/crate-reports');
    }

    public function showCustomer()
    {
        return view('company/customer-reports');
    }

    public function showDealer()
    {
        return view('company/dealer-reports');
    }
}
