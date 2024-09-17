<?php

namespace App\Models;

use CodeIgniter\Model;

class Project_model extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'pid';
    protected $useAutoIncrement = true;

    public function get_project_sum($pid) {
        $db = \Config\Database::connect();
        $post = $db->table('projects')->select('title, image, bio')->where('pid',$pid)->get()->getResultArray();
        return $post;
    }

    public function get_project($pid) {
        $db = \Config\Database::connect();
        $post = $db->table('projects')->where('pid',$pid)->get()->getResultArray();
        return $post;
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

    public function new_post($title, $faculty, $field,$active,$start_date, $finish_date, $bio, $uid, $body, $image)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('posts');
        $data = [
            'title' => $title,
            'faculty' => $faculty,
            'field' => $field,
            'active' => $active,
            'start_date' => $start_date,
            'finish_date' => $finish_date,
            'bio' => $bio,
            'uid' => $uid,
            'body' => $body,
            'image' => $image,
        ];
        return $builder->insert($data);
    }
}
