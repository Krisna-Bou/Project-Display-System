<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $model = model('App\Models\Project_model');
        $data['projects'] = $model->get_projects();  
        $data['fields'] = $model->get_fields();  
        echo view('template/header');
        echo view('template/faculty_head');
        echo view('home', $data);
        echo view('template/footer');
    }

    public function search()
    {
        $model = model('App\Models\Project_model');

        $field = $this->request->getPost('field');
        $faculty = $this->request->getPost('faculty');
        $search = $this->request->getPost('search');  
        $data['projects'] = $model->get_search($search, $field,$faculty); 
        $data['fields'] = $model->get_fields();  
        echo view('template/header');
        echo view('template/faculty_head');
        echo view('home', $data);
        echo view('template/footer');
    }
}
?>