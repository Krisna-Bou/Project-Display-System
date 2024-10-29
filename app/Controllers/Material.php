<?php
namespace App\Controllers;

class Material extends BaseController {

    public function get_projects($mid) {
        $db = \Config\Database::connect();
        $model = model('App\Models\Material_model');
        $data = $model->get_projects($mid);
        echo view('template/header');
        echo view('template/faculty_head');
        echo view('material', $data);
        echo view('template/footer');
    }

    public function get_material($mid) {
        $db = \Config\Database::connect();
        $model = model('App\Models\Material_model');
        $data = $model->get_material($mid);
        
        foreach ($data as $row) {
            $name = $row['name'];
            $description = $row['description'];
            
            // Assuming you want to build an array with all this data
            $data = [
                'mid' => $mid,
                'name' => $name,
                'description' => $description,

            ];
        }

        echo view('template/header');
        echo view('template/faculty_head');
        echo view('material', $data);
        echo view('template/footer');
    }



}

