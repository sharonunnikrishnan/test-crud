<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EmployeeModel;

class Employee extends BaseController{

    public function index()
    {
        $model = new EmployeeModel();
        $employees = $model->findAll(); 

        return view('employees/index', ['employees' => $employees]);
    }

    public function show($id)
    {
        return "Employee ID:" . $id;
    }
}