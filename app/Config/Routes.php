<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// SuperAdmin
$routes->match(['get', 'post'], '/', 'SuperAdminController::login');
$routes->group('/', ['filter' => 'FilterSuperAdmin'], function ($routes) {
    $routes->get('/super-admin', 'SuperAdminController::SuperAdminHome');
    // $routes->get('profile', 'SuperAdminController::showProfile');
    $routes->get('create-company', 'SuperAdminController::createCompany');
    $routes->post('save-company-data', 'SuperAdminController::SaveCompanyData');
    $routes->get('company-list', 'SuperAdminController::companyList');
    $routes->get('super-admin-logout', 'SuperAdminController::logout');
    $routes->get('company-active-deactive/(:num)/(:num)', 'SuperAdminController::companyActiveDeative/$1/$2');
    $routes->get('company-delete/(:num)', 'SuperAdminController::companyDelete/$1');
    $routes->get('company-edit/(:num)', 'SuperAdminController::companyEdit/$1');
    $routes->post('update-company-data', 'SuperAdminController::updateCompanyData');
});


// COMPANY
$routes->match(['get', 'post'], 'company-login', 'CompanyController::companyLogin');
$routes->group('/', ['filter' => 'FilterCompany'], function ($routes) {
    $routes->get('company', 'CompanyController::index');
    $routes->get('company/profile', 'CompanyController::showProfile');
    $routes->get('company/logout', 'CompanyController::logout');

    // CRATES
    $routes->get('add-crate', 'CompanyController::addCrate');
    $routes->get('crate-list', 'CompanyController::crateList');
    $routes->post('save-crate', 'CompanyController::saveCrate');
    $routes->get('crate-delete/(:num)', 'CompanyController::crateDelete/$1');


    // $routes->get('add-form-crate', 'CompanyController::addFormCrate');
    // $routes->post('save-form-crate', 'CompanyController::saveFormCrate');


    // CUSTOMERS
    $routes->get('add-customer', 'CompanyController::addCustomer');
    $routes->get('customer-list', 'CompanyController::customerList');
    $routes->post('save-customer', 'CompanyController::saveCustomers');

    //DEALERS
    $routes->get('add-dealer', 'CompanyController::addDealer');
    $routes->get('dealer-list', 'CompanyController::dealerList');
    $routes->post('dealer-report-save', 'CompanyController::dealerReportSave');
    $routes->post('company-save-dealer', 'CompanyController::companySaveDealer');
    $routes->post('company-update-dealer', 'CompanyController::companyUpdateDealer');
    $routes->get('dealer-delete/(:num)', 'CompanyController::dealerDelete/$1');

    //USERS

    $routes->get('add-user', 'CompanyController::addUser');
    $routes->get('user-list', 'CompanyController::userList');
    $routes->post('save-data-user', 'CompanyController::saveDataCompany');
    $routes->get('user-active-deactive/(:num)/(:num)', 'CompanyController::ActiveDeative/$1/$2');
    $routes->get('user-delete/(:num)', 'CompanyController::userDelete/$1');
    $routes->get('user-edit/(:num)', 'CompanyController::userEdit/$1');
    $routes->post('user-update-data', 'CompanyController::updateUserData');
    $routes->post('user-update-data', 'CompanyController::updateUserData');

    //REPORTS
    $routes->get('crate-reports', 'CompanyController::showCrate');
    $routes->get('customer-reports', 'CompanyController::showCustomer');
    $routes->get('dealer-reports', 'CompanyController::showDealer');
});

// EMPLOYEE
$routes->match(['get', 'post'], 'employee-login', 'EmployeeController::employeeLogin');
$routes->group('employee', ['filter' => 'FilterEmployee'], function ($routes) {
    $routes->get('/', 'EmployeeController::index');
    $routes->get('profile', 'EmployeeController::showProfile');
    $routes->get('add-customer', 'EmployeeController::addCustomer');
<<<<<<< HEAD
    $routes->post('save-customer', 'EmployeeController::saveCustomer');
    $routes->get('select-customer', 'EmployeeController::selectCustomer'); //garbage
    $routes->post('save-crate', 'EmployeeController::saveCrate');
    $routes->post('save-customer-oders', 'EmployeeController::saveCustomerOders');

=======
>>>>>>> 4bb61c1de7f713e9b0151753d28e0aeb64354df3
    $routes->get('add-dealer', 'EmployeeController::addDealer');
    $routes->get('customer-reports', 'EmployeeController::customerReport');
    $routes->get('dealer-reports', 'EmployeeController::dealerReport');
    $routes->get('logout', 'EmployeeController::logout');
});
