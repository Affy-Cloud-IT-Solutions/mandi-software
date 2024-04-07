<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CompanyModel;
use App\Models\UserModel;
use App\Models\BrandModel;
<<<<<<< HEAD
use App\Models\CustomerModel;
=======
use App\Models\DealerModel;
use App\Models\DealerReportModel;
>>>>>>> 31049c468b1c0f875da50cc786721ac19a268c7b

class CompanyController extends BaseController
{
    protected $CompanyModel;
    protected $UserModel;
    protected $BrandModel;
    protected $DealerModel;
    protected $DealerReportModel;

    public function __construct()
    {
        $this->CompanyModel = new CompanyModel();
        $this->UserModel = new UserModel();
        $this->BrandModel = new BrandModel();
        $this->DealerModel = new DealerModel();
        $this->DealerReportModel = new DealerReportModel();
    }
    public function index()
    {
        return view('company/index');
    }

    public function companyLogin()
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_EMAIL);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if ($email && $password) {
            if ($row = $this->CompanyModel->select('*')->where(['is_delete' => 0, 'status' => 0, 'user_id' => $username, 'email' => $email, 'password' => md5($password)])->get()->getRow()) {
                $sessionData = ['companyId' => $row->company_id, 'companyUID' => $row->user_id, 'companyName' => $row->company_name, 'userName' => $row->user_name, 'mobile' => $row->mobile, 'email' => $row->email];
                $this->session->set($sessionData);
                $this->session->setFlashdata('success', 'Successfully Login');
                return redirect()->to(base_url("company"));
            } else {
                $this->session->setFlashdata('error', 'Invalid email or password format.');
            }
        }
        return view('company/login');
    }

    public function showProfile()
    {
        return view('company/profile');
    }

    // CRATES
    public function addCrate()
    {
        $title = "Add Brand";
        $formSave = base_url() . "save-crate";
        return view('company/add-crate', compact("title", "formSave"));
    }

    public function saveCrate()
    {
        $companyUID = $_SESSION['companyUID'];
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
            return redirect()->to(base_url("crate-list"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("crate-list"));
        }
    }

    public function crateDelete($id)
    {
        $this->BrandModel->set('is_delete', 1)->where('id', $id)->update();
        $this->session->setFlashdata('success', 'Crate Successfully Deleted');
        return redirect()->to(base_url("crate-list"));
    }

    public function crateList()
    {
        $title = "Add Brand";
        $formSave = base_url() . "save-crate";
        $companyUID = $_SESSION['companyUID'];
        $brandList = $this->BrandModel->select('*')->where(['is_delete' => '0', 'company_idd' => $companyUID])->orderBy('id', 'desc')->get()->getResult();
        return view('company/crate-list', compact("brandList", "title", "formSave"));
    }

    //CUTOMERS
    public function addCustomer()
    {
        return view('company/add-customer');
    }


    public function saveCustomer(){
        $companyUID = $_SESSION['companyUID'];
    $data = [
    'customerName' =>  $_POST['cutstomer_name'],
    'phone' => $_POST['phone'],
    'company_id' =>  $companyUID,
    'created_at' => date('Y-m-d H:i:s'),
    'is_delete' => false
];
    $dataInsert =  $this->CustomerModel->insert($data);
    if ($customerModel->saveCustomer($data)) {
    echo "Customer saved successfully!";
} else {
    echo "Failed to save customer!";
}
    }

    
    public function customerList()
    {
        return view('company/customer-list');
    }

    //DEALERS
    public function addDealer()
    {
        $companyUID = $_SESSION['companyUID'];
        $dealerList = $this->DealerModel->select('*')->where(['is_delete' => '0', 'company_idd' => $companyUID])->orderBy('id', 'desc')->get()->getResult();
        $userList = $this->BrandModel->select('*')->where(['is_delete' => '0', 'company_idd' => $companyUID])->orderBy('id', 'desc')->get()->getResult();
        return view('company/add-dealer', compact('userList', 'dealerList'));
    }

    public function companySaveDealer()
    {
        $companyUID = $_SESSION['companyUID'];
        $dataKeyValue = [
            'dealer_name' => $_POST['name'],
            'dealer_no' => $_POST['mobile'],
            'company_idd' => $companyUID,
            'created_date' => date('Y-m-d H:i:s'),
        ];
        $dataInsert =  $this->DealerModel->insert($dataKeyValue);
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'Dealer Successfully Insert');
            return redirect()->to(base_url("dealer-list"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("dealer-list"));
        }
    }
    public function companyUpdateDealer()
    {
        $dealer_id  = $_POST['id'];
        $dataKeyValue = [
            'dealer_name' => $_POST['name'],
            'dealer_no' => $_POST['mobile'],
        ];
        $dataInsert =  $this->DealerModel->set($dataKeyValue)->where("id", $dealer_id)->update();
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'Dealer Successfully Update');
            return redirect()->to(base_url("dealer-list"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("dealer-list"));
        }
    }


    public function dealerReportSave()
    {
        $companyUID = $_SESSION['companyUID'];
        $crate_brand = implode(',', $_POST['crate_brand']);
        $dataKeyValue = [
            'units' => $_POST['select_unit'],
            'dealer_id' => $_POST['dealername'],
            'brand_idd' => $crate_brand,
            'vehicle_number' => $_POST['vechile_no'],
            'date' => $_POST['date'],
            'company_idd' => $companyUID,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $dataInsert =  $this->DealerReportModel->insert($dataKeyValue);
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'Dealer Successfully Insert');
            return redirect()->to(base_url("add-dealer"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("add-dealer"));
        }
    }
    public function dealerList()
    {
        $companyUID = $_SESSION['companyUID'];
        $userList = $this->DealerModel->select('*')->where(['is_delete' => '0', 'company_idd' => $companyUID])->orderBy('id', 'desc')->get()->getResult();
        return view('company/dealer-list', compact('userList'));
    }

    public function dealerDelete($id)
    {
        $this->DealerModel->set('is_delete', 1)->where('id', $id)->update();
        $this->session->setFlashdata('success', 'Dealer Successfully Deleted');
        return redirect()->to(base_url("dealer-list"));
    }

    //USERS
    public function addUser()
    {
        $formSave = base_url() . 'save-data-user';
        $title = 'Add User';
        return view('company/add-user', compact("formSave", "title"));
    }

    public function userEdit($id)
    {
        $showPassword = true;
        $title = "Edit";
        $formSave = base_url() . "user-update-data";
        $userData = $this->UserModel->select('*')->where('id', $id)->get()->getRow();
        return view('company/add-user', compact("formSave", "userData", "showPassword", "title"));
    }
    public function saveDataCompany()
    {

        $companyUID = $_SESSION['companyUID'];
        $companyName = $_SESSION['companyName'];
        $dataKeyValue = [
            'usertype' => $_POST['select_type'],
            'name' => $_POST['user_name'],
            'mobile' => $_POST['mobile'],
            'email' => $_POST['email'],
            'company_idd' => $companyUID,
            'company_name' => $companyName,
            'password' => md5($_POST['password']),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $dataInsert =  $this->UserModel->insert($dataKeyValue);
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'User Successfully Insert');
            return redirect()->to(base_url("user-list"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("user-list"));
        }
    }

    public function userList()
    {
        $formSave = base_url() . 'save-data-user';
        $title = 'Add User';
        $companyUID = $_SESSION['companyUID'];
        $userList = $this->UserModel->select('*')->where(['is_delete' => '0', 'company_idd' => $companyUID])->orderBy('id', 'desc')->get()->getResult();
        return view('company/user-list', compact("userList", "formSave", "title"));
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
        $companyUID = $_SESSION['companyUID'];
        $DealerReport = $this->DealerReportModel->select('*')->where(['is_delete' => '0', 'company_idd' => $companyUID])->orderBy('id', 'desc')->get()->getResult();
        return view('company/dealer-reports', compact('DealerReport'));
    }

    public function ActiveDeative($id, $flag)
    {
        $this->UserModel->set('status', $flag)->where('id', $id)->update();
        if ($flag == 0) {
            $this->session->setFlashdata('success', 'User Successfully Deactive');
            return redirect()->to(base_url("user-list"));
        } else {
            $this->session->setFlashdata('success', 'UserModel Successfully Active');
            return redirect()->to(base_url("user-list"));
        }
    }
    public function updateUserData()
    {
        $user_id  = $_POST['id'];
        $dataKeyValue = [
            'name' => $_POST['user_name'],
            'mobile' => $_POST['mobile'],
            'email' => $_POST['email'],
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if (!empty($_POST['password'])) {
            $dataKeyValue['password'] = md5($_POST['password']);
        }
        $dataInsert =  $this->UserModel->set($dataKeyValue)->where("id", $user_id)->update();
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'User Successfully Update');
            return redirect()->to(base_url("user-list"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("user-list"));
        }
    }

    public function userDelete($id)
    {
        $this->UserModel->set('is_delete', 1)->where('id', $id)->update();
        $this->session->setFlashdata('success', 'Company Successfully Deleted');
        return redirect()->to(base_url("user-list"));
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url("company-login"));
    }
}
