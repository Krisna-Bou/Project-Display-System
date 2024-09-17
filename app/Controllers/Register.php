<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        $data['error'] = "";
        echo view('template/header');
        echo view('register', $data);
        echo view('template/footer');
    }
    
    public function hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function check_register()
    {
        $error['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Sorry, the username and email must be unique, and the password must be greater than 8 </div> ";
        $email = $this->request->getPost('email');
        $firstName = $this->request->getPost('firstName');
        $lastName = $this->request->getPost('lastName');
        $password = $this->request->getPost('password');
        $new_pass = $this->hash_password($password);
        $model = model('App\Models\User_model');

        $validationRules = [
            'firstname' => 'required|alpha_numeric_space',
            'lastName' => 'required|alpha_numeric_space',
            'email' => 'required|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ];
        if ($this->validate($validationRules)) {
            $model->new_user($email, $firstName, $lastName, $new_pass);
            # Create a session 
            $session = session();
            $session->set('firstName', $firstName);
            $session->set('lastName', $lastName);
            $session->set('email',$email);
            $token = md5(uniqid());
            $session->set('token', $token);
            $data = $model->get_user($email);
            foreach ($data as $row) {
                $session->set('uid',$row['uid']);
            }
            return redirect()->to(base_url());
        } else {
            echo view('template/header');
            echo view('register', $error);
            echo view('template/footer');
        }
    }
}
