<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        $data['error'] = "";
        echo view('template/header');
        echo view('template/faculty_head');
        echo view('register', $data);
        echo view('template/footer');
    }
    
    public function hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function check_register()
    {
        $error['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Sorry, there was an error </div> ";
        $email = $this->request->getPost('email');
        $firstName = $this->request->getPost('firstName');
        $lastName = $this->request->getPost('lastName');
        $password = $this->request->getPost('password');
        $new_pass = $this->hash_password($password);
        $model = model('App\Models\User_model');
        $validationRules = [
            'firstName' => 'required|alpha',
            'lastName' => 'required|alpha',
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
            $data = $model->set_session($email);
            $session->set('uid', $data[0]['uid']);
            return redirect()->to(base_url().'profile/'.$data[0]['uid']);
        } else {
            echo view('template/header');
            echo view('template/faculty_head');
            echo view('register', $error);
            echo view('template/footer');
        }
    }
}
