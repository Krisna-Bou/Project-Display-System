<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'uid';
    protected $useAutoIncrement = true;

    public function login($email, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('email', $email);
        $query = $builder->get();
        $result = $query->getRowArray();
        if ($result == NULL) {
            return false;
        }
        if (password_verify($password,$result['password'])) {
            return true;
        }
        return false;
    }

    public function update_pass($email, $pass)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('email',$email);
        $data = [
            'password' => $pass,
        ];
        return $builder->update($data);
    }

    public function new_user($email, $firstname, $lastname, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $data = [
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'password' => $password,
        ];
        return $builder->insert($data);
    }

    public function get_user($email, $password) {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('uid, email');
        $builder->where('email',$email);
        $query = $builder->get();
        $results = $query->getResultArray();
        return $results;
    }

    public function get_name($email, $password) {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('uid, firstname, lastname');
        $builder->where('email',$email);
        $builder->where('password',$password);
        $query = $builder->get();
        $results = $query->getResultArray();
        return $results;
    }
}
