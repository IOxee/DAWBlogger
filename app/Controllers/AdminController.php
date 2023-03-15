<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $usersMDL = new \App\Models\UsersModel();
        $rolesMDL = new \App\Models\RolesModel();


        $data = [
            'users' => $usersMDL->getAllUsers(),
            'roles' => $rolesMDL->getAllRoles(),
        ];



        return view('templates/header')
            . view('private/private_admin', $data)
            . view('templates/footer');
    }

    public function createRole() {
        $post = $this->request->getPost([
            'nameOfRole',
            'levelOfPermissions'
        ]);

        $rolesMDL = new \App\Models\RolesModel();

        $varCheck = $rolesMDL->insert([
            'name' => $post['nameOfRole'],
            'permissions' => $post['levelOfPermissions']
        ]);

        if ($varCheck) {
            session()->setFlashdata([
                'type' => 'success',
                'message' => 'Role has been created',
                'role' => $post['nameOfRole'],
                'permissions' => $post['levelOfPermissions']
            ]);

        } else {
            session()->setFlashdata([
                'type' => 'error',
                'role' => $post['nameOfRole'],
                'permissions' => $post['levelOfPermissions']
            ]);
        }

        return redirect()->to(base_url('admin'));

        
    }
    public function setRole() {
        $post = $this->request->getPost([
            'userSelect',
            'roleSelect'
        ]);

        $usersMDL = new \App\Models\UsersModel();

        $varCheck = $usersMDL->updateRole($post['userSelect'], $post['roleSelect']);
        if ($varCheck) {
            session()->setFlashdata([
                'type' => 'success',
                'message' => 'Role has been set',
                'user' => $post['userSelect'],
                'role' => $post['roleSelect']
            ]);
        } else {
            session()->setFlashdata([
                'type' => 'error',
                'user' => $post['userSelect'],
                'role' => $post['roleSelect']
            ]);
        }

        return redirect()->to(base_url('admin'));
    }
}
