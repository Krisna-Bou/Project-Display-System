<?php
namespace App\Controllers;

class Login extends BaseController
{

    
    public function index()
    {
        echo view("template/header");
        // check whether the cookie is set or not, if set redirect to welcome page, if not set, check the session
        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            echo view("home");

        }
        else {
            $session = session();
            $username = $session->get('username');
            $password = $session->get('password');
            if ($username && $password) {
                echo view("home");
            } else {
                $data['error'] = "";
                echo view('login');
            }
        }
        echo view("template/footer");
    }

    public function hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function check_login()
    {
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $model = model('App\Models\User_model');
        $check = $model->login($username, $password);
        $if_remember = $this->request->getPost('remember');
        if ($check) {
            # Create a session 
            $session = session();
            $session->set('username', $username);
            $session->set('password', $password);
            $data = $model->get_user($username, $password);


            
            foreach ($data as $row) {
                $session->set('uid',$row['uid']);
                $session->set('email',$row['email']);
            }
            if ($if_remember) {
                # Create a cookie
                setcookie('username', $username, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
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
        setcookie('username', '', time() - 3600, "/");
        setcookie('password', '', time() - 3600, "/");
        return redirect()->to(base_url('login'));
    }
}
