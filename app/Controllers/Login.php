<?php
namespace App\Controllers;

class Login extends BaseController
{

    
    public function index()
    {
        // check whether the cookie is set or not, if set redirect to welcome page, if not set, check the session
        if (isset($_COOKIE['email']) && isset($_COOKIE['token'])) {
            echo view("home");
        }
        else {
            $session = session();
            $uid = $session->get('uid');
            $email = $session->get('email');
            $token = $session->get('token');
            $firstName = $session->get('firstName');
            $lastName = $session->get('lastName');
            if ($email && $token) {
                echo view("template/header");
                echo view("home");
                echo view("template/footer");
            } else {
                $data['error'] = "";
                echo view("template/header");
                echo view('login', $data);
                echo view("template/footer");
            }
        }
        
    }

    public function hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function check_login()
    {
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $model = model('App\Models\User_model');
        $check = $model->login($email, $password);
        $if_remember = $this->request->getPost('remember');
        if ($check) {
            # Create a session 
            $session = session();
            $session->set('email', $email);
            $token = md5(uniqid());
            $session->set('token', $token);
            $data = $model->set_session($email);
            foreach ($data as $row) {
                $session->set('uid',$row['uid']);
                $session->set('firstName', $row['firstName']);
                $session->set('lastName', $row['lastName']);
            }
            if ($if_remember) {
                # Create a cookie
                setcookie('email', $email, time() + (86400 * 30), "/");
                setcookie('token', $token, time() + (86400 * 30), "/");
            }
            //echo view('notification');
            return redirect()->to(base_url());
        } else {
            echo view('template/header');
            echo view('login', $data);
            echo view('template/footer');
        }
    }

    public function forgot_pass()
    {
        echo view('template/header');
        echo view('secret_questions');
        echo view('template/footer');
    }

    public function logout()
    {
        helper('cookie');
        $session = session();
        $session->destroy();
        //destroy the cookie
        setcookie('email', '', time() - 3600, "/");
        setcookie('token', '', time() - 3600, "/");
        return redirect()->to(base_url('login'));
    }
}
