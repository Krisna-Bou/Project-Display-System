<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function view_profile($uid)
    {
        $db = \Config\Database::connect();
        $model = model('App\Models\User_model');
        $data['user'] = $model->get_user_profile($uid);
        $model = model('App\Models\Project_model');
        $data['projects'] = $model->get_user_projects($uid);
        echo view("template/header");
        echo view('template/faculty_head');
        echo view("profile", $data);
        echo view("template/footer");
    }

    public function edit_profile($uid)
    {
        $db = \Config\Database::connect();
        $model = model('App\Models\User_model');
        $data['user'] = $model->get_user_profile($uid);
        echo view("template/header");
        echo view('template/faculty_head');
        echo view("edit_profile", $data);
        echo view("template/footer");
    }

    public function check_edit($uid)
    {
        $db = \Config\Database::connect();
        $model = model('App\Models\User_model');
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
        $data['user'] = $model->get_user_profile($uid);
        $title = $this->request->getPost('title');
        $position = $this->request->getPost('position');
        $faculty = $this->request->getPost('faculty');
        $phone = $this->request->getPost('phone');
        $bio = $this->request->getPost('bio');
        $check = $model->update_profile($uid, $title,$position,  $faculty, $phone, $bio);
        if ($check) {
            return redirect()->to(base_url().'profile/'.$uid);
        }
        else {
            echo view("template/header");
            echo view('template/faculty_head');
            echo view("edit_profile", $data);
            echo view("template/footer");
        }
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