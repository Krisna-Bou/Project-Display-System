<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function index()
    {
        echo view("template/header");
        echo view("account");
        echo view("template/footer");
    }

    public function update_email(){
        $session = session();
        $email = $this->request->getPost('email');
        $uid = $session->get('uid');
        $model = model('App\Models\User_model');
        $model->update_email($uid,$email);
        return redirect()->to(base_url('/account'));
    }

    public function upload_file() {
        $file = $this->request->getFile('userfile');
        $file->move(WRITEPATH . 'uploads');
        $profileImage = $file->getName();
        $uid = $session->get('uid');
        $model = model('App\Models\User_model');
        $model->upload($uid, $profileImage);
        return redirect()->to(base_url('/account'));
    }
}