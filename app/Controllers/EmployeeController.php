<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\CustomerOrderModel;


class EmployeeController extends BaseController
{
    protected $UserModel;
<<<<<<< HEAD
    protected $CustomerModel;
    protected $BrandModel;
    protected $CustomerOrderModel;
=======
>>>>>>> 4bb61c1de7f713e9b0151753d28e0aeb64354df3

    public function __construct()
    {
        $this->UserModel = new UserModel();
<<<<<<< HEAD
        $this->CustomerModel = new CustomerModel();
        $this->BrandModel = new BrandModel();
        $this->CustomerOrderModel = new CustomerOrderModel();
=======
>>>>>>> 4bb61c1de7f713e9b0151753d28e0aeb64354df3
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
<<<<<<< HEAD
        $customers = $this->CustomerModel->findAll();
        $brands = $this->BrandModel->findAll();
        return view('employee/add-customer', compact('customers', 'brands'));
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
        // $dataKeyValue = [
        //     'customerName' => $_POST['customerName'],
        //     'brandName' => $_POST['brandName'],
        //     'units' => $_POST['units'],
        //     'date' => date('Y-m-d H:i:s'),
        // ];
        // $dataInsert =  $this->CustomerOrderModel->insert($dataKeyValue);

        // if ($dataInsert) {
        //     $this->session->setFlashdata('success', 'Customer Oders Successfully Insert');
        //     return redirect()->to(base_url("employee/add-customer"));
        // } else {
        //     $this->session->setFlashdata('error', 'Something Went Wrong');
        //     return redirect()->to(base_url("employee/add-customer"));
        // }
        
    }

=======
        return view('employee/add-customer');
    }
>>>>>>> 4bb61c1de7f713e9b0151753d28e0aeb64354df3
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
