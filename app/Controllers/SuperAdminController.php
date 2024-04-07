<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SuperAdminModel;
use App\Models\CompanyModel;
use CodeIgniter\Http\Request;

class SuperAdminController extends BaseController
{
    protected $superAdminModel;
    protected $CompanyModel;

    public function __construct()
    {
        $this->superAdminModel = new SuperAdminModel();
        $this->CompanyModel = new CompanyModel();
    }
    public function SuperAdminHome()
    {
        $companyData = $this->CompanyModel->select('*')->where('is_delete', '0')->orderBy('company_id', 'desc')->limit(10)->get()->getResult();
        return view('super_admin/index', compact('companyData'));
    }

    public function login()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if ($email && $password) {
            if ($row = $this->superAdminModel->select('*')->where(['email' => $email, 'password' => md5($password)])->get()->getRow()) {
                $sessionData = ['au_id' => $row->id, 'companyName' => $row->companyName, 'userName' => $row->userName, 'mobile' => $row->mobile, 'email' => $row->email];
                $this->session->set($sessionData);
                $this->session->setFlashdata('success', 'Successfully Login');
                return redirect()->to(base_url("super-admin"));
            } else {
                $this->session->setFlashdata('error', 'Invalid email or password format.');
            }
        }
        return view('super_admin/login');
    }

    public function createCompany()
    {
        $title = "Edit";
        $formSave = base_url() . "save-company-data";
        return view('super_admin/create-company', compact("formSave", "title"));
    }
    public function SaveCompanyData()
    {

        // $validation = \Config\Services::validation();
        // $validation->setRules(
        //     [
        //         'district_code' => 'required',
        //         'tehsil_code' => 'required',
        //         'block_name' => 'required|is_unique[blocks.block_name]',
        //         'block_code' => 'required|is_unique[blocks.block_code]',
        //         // 'block_total_villages' => 'required',
        //     ],
        //     [
        //         'district_code' => ['required' => 'District code is required'],
        //         'tehsil_code' => ['required' => 'Tehsil code is required'],
        //         'block_name' => ['required' => 'Block name is required', 'is_unique' => 'Tehsil name must be unique'],
        //         'block_code' => ['required' => 'Block code is required', 'is_unique' => 'Tehsil code must be unique'],
        //         // 'block_total_villages' => ['required' => 'Block total village count is required'],
        //     ]
        // );
        // if (!$validation->withRequest($this->request)->run()) {}
        $userId = $this->generateRand();
        $dataKeyValue = [
            'company_name' => $_POST['company_name'],
            'user_name' => $_POST['user_name'],
            'user_id' => $userId,
            'email' => $_POST['email'],
            'mobile' => $_POST['mobile'],
            'password' => md5($_POST['password']),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $dataInsert =  $this->CompanyModel->insert($dataKeyValue);
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'Company Successfully Insert');
            return redirect()->to(base_url("company-list"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("company-list"));
        }
    }
    public function CompanyList()
    {
        $companyData = $this->CompanyModel->select('*')->where('is_delete', '0')->orderBy('company_id', 'desc')->get()->getResult();
        return view('super_admin/company-list', compact("companyData"));
    }
    public function showProfile()
    {
        return view('super_admin/profile');
    }

    public function generateRand()
    {
        $randomNumber = rand(1000, 9999);
        return 'affy' . $randomNumber;
    }
    public function companyActiveDeative($id, $flag)
    {
        $this->CompanyModel->set('status', $flag)->where('company_id', $id)->update();
        if ($flag == 0) {
            $this->session->setFlashdata('success', 'Company Successfully Active');
            return redirect()->to(base_url("company-list"));
        } else {
            $this->session->setFlashdata('error', 'Company Successfully Deactive');
            return redirect()->to(base_url("company-list"));
        }
    }
    public function companyDelete($id)
    {
        $this->CompanyModel->set('is_delete', 1)->where('company_id', $id)->update();
        $this->session->setFlashdata('error', 'Company Successfully Deleted');
        return redirect()->to(base_url("company-list"));
    }

    public function companyEdit($id)
    {
        $showPassword = true;
        $title = "Update";
        $formSave = base_url() . "update-company-data";
        $companyData = $this->CompanyModel->select('*')->where('company_id', $id)->get()->getRow();
        return view('super_admin/create-company', compact("formSave", "companyData", "showPassword", "title"));
    }
    public function updateCompanyData()
    {
        $company_id  = $_POST['id'];
        $dataKeyValue = [
            'company_name' => $_POST['company_name'],
            'user_name' => $_POST['user_name'],
            'email' => $_POST['email'],
            'mobile' => $_POST['mobile'],
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if (!empty($_POST['password'])) {
            $dataKeyValue['password'] = md5($_POST['password']);
        }
        $dataInsert =  $this->CompanyModel->set($dataKeyValue)->where("company_id", $company_id)->update();
        if ($dataInsert) {
            $this->session->setFlashdata('success', 'Company Successfully Update');
            return redirect()->to(base_url("company-list"));
        } else {
            $this->session->setFlashdata('error', 'Something Went Wrong');
            return redirect()->to(base_url("company-list"));
        }
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url("/"));
    }
}
