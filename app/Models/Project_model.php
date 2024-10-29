<?php

namespace App\Models;

use CodeIgniter\Model;

class Project_model extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'pid';
    protected $useAutoIncrement = true;

    public function get_projects() {
        $db = \Config\Database::connect();
        $data = $db->table('projects')->select('pid, title, image, bio')->get()->getResultArray();
        return $data;
    }

    public function get_fields(){
        $db = \Config\Database::connect();
        $data = $db->table('projects')->select('field')->distinct()->get()->getResultArray();
        return $data;
    }

    
    public function get_search($search, $field, $faculty) { 
        $db = \Config\Database::connect();
        $builder = $db->table('projects')->select('pid, title, image, bio');
    
        if (!empty($search)) {
            $builder->like('title', $search);
        }
    
        if ($field != 'x') {
            $builder->where('field', $field);
        }
    
        if ($faculty != 'x') {
            $builder->where('faculty', $faculty);
        }
    
        $data = $builder->get()->getResultArray();
        return $data;
    }
    

    public function get_project($pid) {
        $db = \Config\Database::connect();
        $data = $db->table('projects')->where('pid',$pid)->get()->getResultArray();
        return $data;
    }

    public function get_user_projects($uid) {
        $db = \Config\Database::connect();
        $data = $db->table('projects')->where('uid',$uid)->get()->getResultArray();
        return $data;
    }

    public function upload($pid, $image)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('images');
        $data = [
            'pid' => $pid,
            'image' => $image,
        ];
        if ($this->get_image($pid)) {
            $builder->where('pid',$pid);
            return $builder->update($data);
        } else {
            return $builder->insert($data);
        }
    }

    public function create_project($title, $faculty, $field,$start_date, $finish_date, $bio, $uid, $body, $image)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('projects');
        $data = [
            'title' => $title,
            'faculty' => $faculty,
            'field' => $field,
            'start_date' => $start_date,
            'finish_date' => $finish_date,
            'bio' => $bio,
            'uid' => $uid,
            'body' => $body,
            'image' => $image,
        ];
        $builder->insert($data);
        $query = $db->query('SELECT MAX(pid) as pid FROM projects');
        $results = $query->getResultArray();
        return $results;
    }
}
