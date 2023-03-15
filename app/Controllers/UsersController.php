<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function login()
    {
        $data['title'] = "Login usuaris";

        echo view('templates/header', $data)
            . view('users/login')
            . view('templates/footer');
    }
    public function login_post()
    {
        $validationRules =
        [
            'email' => [
                'label' => 'eMail usuari',
                'rules' => 'required',
                // |valid_email',
                'errors' => [
                    'required' => 'eMail es un camp obligatori',
                    'valid_email' => 'No és un mail valid',
                ],
            ],
            'password' => [
                'label' => 'Contrasenya usuari',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'min_length' => 'La clau ha de tenir més de 3 caracters',
                    'required' => 'La clau és un camp obligatori',
                ],
            ],
        ];
        
        if ($this->validate($validationRules)) {

            $model = new UsersModel();

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $model->getUserByMailOrUsername($email);
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $role = $user['name'] == 'admin' ? 'admin' : 'user';
                    $sessionData = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role' => $role,
                        'loggedIn' => true,
                    ];

                    session()->set($sessionData);
                    return redirect()->to(base_url('panel'));
                } else {
                    d('error', 'Failed! incorrect password');
                    session()->setFlashdata('error', 'Failed! incorrect password');
                    return redirect()->to(base_url('login'));
                }
            } else {
                session()->setFlashdata('email', $email);
                return redirect()->to(base_url('register'));
            }
        } else {
            return redirect()->back()->withInput();
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }

    public function registerView() 
    {
        echo view('templates/header'). view('users/register'). view('templates/footer');
    }

    public function register()
    {
        $validationRules = 
        [
            'name' => [
                'label' => 'Nombre de usuario',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El nombre de usuario es un campo obligatorio',
                ],
            ],

            'email' => [
                'label' => 'Correo electrónico',
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'El correo electrónico es un campo obligatorio',
                    'valid_email' => 'No es un correo electrónico válido',
                    'is_unique' => 'El correo electrónico ya está registrado',
                ],
            ],

            'password' => [
                'label' => 'Contraseña',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'La contraseña debe tener más de 3 caracteres',
                    'required' => 'La contraseña es un campo obligatorio',
                ],
            ],

            'password_confirm' => [
                'label' => 'Confirmar contraseña',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'La confirmación de la contraseña es un campo obligatorio',
                    'matches' => 'La confirmación de la contraseña no coincide',
                ],
            ],
        ];

        if ($this->validate($validationRules)) {
            $model = new UsersModel();

            $username = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $data = [
                'name' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];

            $user = $model->insert($data);
            if ($user) {
                return redirect()->to(base_url('login'));
            } else {
                return redirect()->back()->withInput();
            }
        }
    }

    public function private_dashboard($type = "")
    {
        return view('templates/header')
            . view('users/private')
            . view('templates/footer');
    }

    
}