<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function register()
    {
        helper(['form']);
        $data = [];
        echo view('admins/register', $data);
    }

    public function doRegister()
    {
        helper(['form']);
        $rules = [
          'username' => 'required|min_length[4]|max_length[100]',
          'email' => 'required|valid_email|is_unique[users.email]',
          'password' => 'required|min_length[4]|max_length[50]',
          'confirm_password' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);

            // Redirect to the login page using the named route
            return redirect()->to('admins/add_Prod');
        } else {
            $data['validation'] = $this->validator;
            return view('admins/register', $data);
        }
    }


    public function login()
    {
        helper(['form']);
        echo view('admins/signin');
    }

    public function doLogin()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Check if a user with the provided email exists in the database
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            // If the user exists, verify the provided password
            $storedPassword = $user['password'];
            $isPasswordCorrect = password_verify($password, $storedPassword);

            if ($isPasswordCorrect) {
                // Password is correct, set user session data and redirect to the desired page
                $ses_data = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admins/add_Prod'); // Corrected URL
            } else {
                // Password is incorrect, show an error message
                $session->setFlashdata('msg', 'Password is incorrect');
                return redirect()->to('/SignController/Login'); // Corrected URL
            }
        } else {
            // User with the provided email does not exist, show an error message
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/SignController/Login'); // Corrected URL
        }
    }


}
