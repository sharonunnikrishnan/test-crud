<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{
    public function index()
    { 
        $db = \Config\Database::connect(); 

        $employees = $db->table('employees')
                    ->get()->getResultArray();
 
        return view('employees/index', ['employees' => $employees]);
    }
    
    public function create()
    {
        return view('employees/create');
    }

    public function store()
    {

        $rules =[
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[10]|max_length[15]',
            'department' => 'required',
            'status' => 'required|in_list[active,inactive]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'department' => $this->request->getPost('department'),
            'status' => $this->request->getPost('status'),
        ];

        $db->table('employees')->insert($data);
        return redirect()->to('/employees');
    }

    public function edit($id)
    { 
        $db = \Config\Database::connect();
        $employees = $db->table('employees')
                    ->where('id', $id)
                    ->get()
                    ->getResultArray();
        if(!$employees)
        {
            echo "Employee not found"; exit;
        }

        return view('employee/edit', [
            'employees' => $employees
        ]);
    }

    public function update($id)
    {
         $rules =[
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[10]|max_length[15]',
            'department' => 'required',
            'status' => 'required|in_list[active,inactive]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'department' => $this->request->getPost('department'),
            'status' => $this->request->getPost('status'),
        ];

        $db->table('employees')->where('id',$id)->update($data);
        return redirect()->to('/employees');
    }
}