<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// SuperAdmin
$routes->group('super-admin', function ($routes) {
    $routes->get('/', 'SuperAdminController::SuperAdminHome');
    $routes->get('login', 'SuperAdminController::login');
    $routes->get('profile', 'SuperAdminController::showProfile');

    $routes->get('create-company', 'SuperAdminController::createCompany');
    $routes->get('company-list', 'SuperAdminController::companyList');
});


// COMPANY
$routes->group('company', function ($routes) {
    $routes->get('/', 'CompanyController::index');
    $routes->get('login', 'CompanyController::login');
    $routes->get('profile', 'CompanyController::showProfile');

    // CRATES
    $routes->get('add-crate', 'CompanyController::addCrate');
    $routes->get('crate-list', 'CompanyController::crateList');

    // CUSTOMERS
    $routes->get('add-customer', 'CompanyController::addCustomer');
    $routes->get('customer-list', 'CompanyController::customerList');

    //DEALERS
    $routes->get('add-dealer', 'CompanyController::addDealer');
    $routes->get('dealer-list', 'CompanyController::dealerList');

    //USERS

    $routes->get('add-user', 'CompanyController::addUser');
    $routes->get('user-list', 'CompanyController::userList');

    //REPORTS
    $routes->get('crate-reports', 'CompanyController::showCrate');
    $routes->get('customer-reports', 'CompanyController::showCustomer');
    $routes->get('dealer-reports', 'CompanyController::showDealer');

});

// EMPLOYEE
$routes->group('employee', function($routes) {
    $routes->get('/', 'EmployeeController::index');
    $routes->get('login', 'EmployeeController::login');
    $routes->get('profile', 'EmployeeController::showProfile');
    $routes->get('add-customer', 'EmployeeController::addCustomer');
    $routes->get('add-dealer', 'EmployeeController::addDealer');
    $routes->get('customer-reports', 'EmployeeController::customerReport');
    $routes->get('dealer-reports', 'EmployeeController::dealerReport');
});

