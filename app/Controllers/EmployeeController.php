<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\CustomerOrderModel;
use App\Models\CustomerModel;
use App\Models\BrandModel;
use App\Models\DealerModel;
use App\Models\DealerReportModel;


class EmployeeController extends BaseController
{
    protected $UserModel;
    protected $CustomerModel;
    protected $BrandModel;
    protected $CustomerOrderModel;
    protected $DealerModel;
    protected $DealerReportModel;



    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->CustomerModel = new CustomerModel();
        $this->BrandModel = new BrandModel();
        $this->CustomerOrderModel = new CustomerOrderModel();
        $this->DealerModel = new DealerModel();
        $this->DealerReportModel = new DealerReportModel();
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
        $companyUID = $_SESSION['companyId'];
        $customers = $this->CustomerModel->select('*')->where(['status' => '0', 'is_delete' => '0', 'company_idd' => $companyUID])->orderBy('id', 'desc')->get()->getResult();
        $brands = $this->BrandModel->select('*')->where(['is_delete' => '0', 'company_idd' => $companyUID])->orderBy('id', 'desc')->get()->getResult();
        return view('employee/add-customer', compact('customers', 'brands'));
    }

    public function employeeSaveCustomer()
    {
        $us_id = $_SESSION['us_id'];
        $company_idd = $_SESSION['companyId'];
        $dataKeyValue = [
            'customerName' => $_POST['name'],
            'phone' => $_POST['mobile'],
            'date' => date('Y-m-d H:i:s'),
            'company_idd' => $company_idd,
            'emp_id' => $us_id,
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

    // CRATES BRANDS

    public function saveCrate()
    {
        $companyUID = $_SESSION['companyId'];
        $dataKeyValue = [
            'brandName' => $_POST['brand_name'],
            'ownerName' => $_POST['owner_name'],
            'numberOfCrates' => $_POST['no_crate'],
            'company_idd' => $companyUID,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $dataInsert =  $this->BrandModel->insert($dataKeyValue);
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'Crate Successfully Insert');
            return redirect()->to(base_url("employee/add-customer"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("employee/add-customer"));
        }
    }

    // UPDATE BRANDS
    public function updateBrand($id = null)
    {
        $id = $this->request->getPost('brand_id');
        $data = [
            'brandName' => $this->request->getPost('brand_name'),
            'ownerName' => $this->request->getPost('owner_name'),
            'numberOfCrates' => $this->request->getPost('no_crate')
        ];

        $this->BrandModel->where('id', $id)->update($data);

        return redirect()->to(base_url('employee/add-customer'))->with('success', 'Brand details updated successfully!');
    }

    public function saveCustomerOders()
    {
        $us_id = $_SESSION['us_id'];
        $companyUID = $_SESSION['companyId'];
        $crateBrand = implode(',', $_POST['crate_brand']);
        $dataKeyValue = [
            'customer_idd' => $_POST['Customername'],
            'brand_idd' => $crateBrand,
            'units' => $_POST['select_unit'],
            'date' => $_POST['date'],
            'company_idd' => $companyUID,
            'customer_created_id' => $us_id,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $dataInsert =  $this->CustomerOrderModel->insert($dataKeyValue);
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'Customer Successfully Insert');
            return redirect()->to(base_url("employee/add-customer"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("employee/add-customer"));
        }
    }

    public function addDealer()
    {
        $companyUID = $_SESSION['companyId'];
        $dealerList = $this->DealerModel->select('*')->where(['is_delete' => '0', 'company_idd' => $companyUID])->orderBy('id', 'desc')->get()->getResult();
        $userList = $this->BrandModel->select('*')->where(['is_delete' => '0', 'company_idd' => $companyUID])->orderBy('id', 'desc')->get()->getResult();
        return view('employee/add-dealer', compact('userList', 'dealerList'));
    }

    public function companySaveDealer()
    {
        $companyUID = $_SESSION['companyId'];
        $dataKeyValue = [
            'dealer_name' => $_POST['name'],
            'dealer_no' => $_POST['mobile'],
            'company_idd' => $companyUID,
            'created_date' => date('Y-m-d H:i:s'),
        ];
        $dataInsert =  $this->DealerModel->insert($dataKeyValue);
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'Dealer Successfully Insert');
            return redirect()->to(base_url("employee/add-dealer"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("employee/add-dealer"));
        }
    }

    public function dealerReportSave()
    {
        $us_id = $_SESSION['us_id'];
        $companyUID = $_SESSION['companyId'];
        $crate_brand = implode(',', $_POST['crate_brand']);
        $dataKeyValue = [
            'units' => $_POST['select_unit'],
            'dealer_id' => $_POST['dealername'],
            'brand_idd' => $crate_brand,
            'vehicle_number' => $_POST['vechile_no'],
            'date' => $_POST['date'],
            'company_idd' => $companyUID,
            'customer_created_id' => $us_id,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $dataInsert =  $this->DealerReportModel->insert($dataKeyValue);
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'Dealer Successfully Insert');
            return redirect()->to(base_url("employee/add-dealer"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("employee/add-dealer"));
        }
    }
    public function customerReport()
    {
        $companyUID = $_SESSION['companyId'];
        $us_id = $_SESSION['us_id'];
        $customerReport = $this->CustomerOrderModel->select('*')->where(['delete_status' => '0', 'company_idd' => $companyUID, 'customer_created_id' => $us_id])->orderBy('id', 'desc')->get()->getResult();
        return view('employee/customer-reports', compact('customerReport'));
    }
    public function dealerReport()
    {
        $companyUID = $_SESSION['companyId'];
        $us_id = $_SESSION['us_id'];
        $DealerReport = $this->DealerReportModel->select('*')->where(['is_delete' => '0', 'company_idd' => $companyUID, 'customer_created_id' => $us_id])->orderBy('id', 'desc')->get()->getResult();
        return view('employee/dealer-reports', compact('DealerReport'));
    }

    public function companyForm()
    {
        $crate_for = $_POST['crate_for'];
        $brandList = $this->BrandModel->select('*')->whereIn('id', $crate_for)->get()->getResult();
        return view('employee/ajax_form_append', compact('brandList'));
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url("employee-login"));
    }
}
