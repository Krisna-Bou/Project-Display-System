<?php

namespace App\Models;

use CodeIgniter\Model;

class Material_model extends Model
{
    protected $table = 'materials';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    // public function get_projects($mid) {
    //     $db = \Config\Database::connect();
    //     $data = $db->table('materials')->where('mid', $mid)->get()->getResultArray();
    //     return $data;
    // }

    public function get_material($mid) {
        $db = \Config\Database::connect();
        $data = $db->table('materials')->where('mid', $mid)->get()->getResultArray();
        return $data;
    }
    public function get_materials($pid){
        $db = \Config\Database::connect();
        $data = $db->table('project_materials')->where('pid', $pid)->distinct()->get()->getResultArray();
        return $data;
    }


}
