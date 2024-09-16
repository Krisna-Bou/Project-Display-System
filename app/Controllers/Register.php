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
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $password = $this->request->getPost('password');
        $new_pass = $this->hash_password($password);
        $model = model('App\Models\User_model');

        $validationRules = [
            'firstname' => 'required|alpha_numeric_space',
            'lastname' => 'required|alpha_numeric_space',
            'email' => 'required|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ];
        if ($this->validate($validationRules)) {
            $model->new_user($email, $firstname, $lastname, $new_pass);
            # Create a session 
            $session = session();
            $session->set('firstname', $firstname);
            $session->set('lastname', $lastname);
            $session->set('token', $token);
            $session->set('password', $new_pass);
            $session->set('email',$email);
            $data = $model->get_user($email, $password);
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
