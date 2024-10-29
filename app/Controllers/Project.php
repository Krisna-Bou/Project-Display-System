<?php
namespace App\Controllers;

class Project extends BaseController {

    public function index() {
        $data['error'] = "";
        echo view('template/header');
        echo view('template/faculty_head');
        echo view('create_project', $data);
        echo view('template/footer');
    }

    public function view_all_projects() {
        $db = \Config\Database::connect();
        $model = model('App\Models\Project_model');
        $data = $model->view_all_projects();

        foreach ($data as $row) {
            $email = $row['email'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $title = $row['title'];
            $position = $row['position'];
            $faculty = $row['faculty'];
            $phone = $row['phone'];
            $profileImage = $row['profileImage'];
        }
    }

    public function view_project($pid) {
        $db = \Config\Database::connect();
        $model = model('App\Models\Project_model');
        $data = $model->get_project($pid);
       
        foreach ($data as $row) {
            $pid = $row['pid'];
            $title = $row['title'];
            $faculty = $row['faculty'];
            $field = $row['field'];
            $bio = $row['bio'];
            $body = $row['body'];
            $start_date = $row['start_date'];
            $finish_date = $row['finish_date'];
            $image = $row['image'];
            $uid = $row['uid'];
            
            // Assuming you want to build an array with all this data
            $data = [
                'pid' => $pid,
                'title' => $title,
                'faculty' => $faculty,
                'field' => $field,
                'bio' => $bio,
                'body' => $body,
                'start_date' => $start_date,
                'finish_date' => $finish_date,
                'image' => $image,
                'uid' => $uid,
            ];
        }
        echo view('template/header');
        echo view('template/faculty_head');
        echo view('project', $data);
        echo view('template/footer');
    }

    public function create_project(){    
        $error['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Sorry, the username and email must be unique, and the password must be greater than 8 </div> ";
        $session = session();
        $model = model('App\Models\Project_model');
        $uid = $session->get('uid');
        $title = $this->request->getPost('title');
        $faculty = $this->request->getPost('faculty');
        $field = $this->request->getPost('field');
        $bio = $this->request->getPost('bio');
        $body = $this->request->getPost('body');
        $start_date = $this->request->getPost('start_date');
        $finish_date = $this->request->getPost('finish_date');
        $image = "/Project-Display/writable/uploads/img/default-user.png";
        $validationRules = [
            'title' => 'required|alpha_numeric_space',
            'faculty' => 'required|alpha_numeric_space',
            'field' => 'required|alpha_numeric_space',
            'bio' => 'required|alpha_numeric_space',
            'body' => 'required|alpha_numeric_space',
        ];
        if ($finish_date){
            $x = "TRUE";

        }
        else{
            $x = "FALSE";
        }
        $error['error'] = $x;
        if ($this->validate($validationRules)) {
            $data = $model->create_project($title, $faculty, $field, $start_date, $finish_date, $bio, $uid, $body, $image);
            $pid =   $data[0]['pid'];
            return redirect()->to(base_url().'project/'.$pid);
        } else {
            echo view('template/header');
            echo view('template/faculty_head');
            echo view('create_project', $error);
            echo view('template/footer');
        }
    }
    
    public function upload_image(){
        $file = $this->request->getFile('file');
        $file->move(WRITEPATH . 'uploads');
        $filename = $file->getName();
        $model = model('App\Models\Post_model');
        $session = session();
        $model->upload($session->get('pid'), $filename);
    }
}

