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

    public function update_email($uid, $email)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('uid',$uid);
        $data = [
            'email' => $email,
        ];
        return $builder->update($data);
    }

    public function new_user($email, $username, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $data = [
            'email' => $email,
            'username' => $username,
            'password' => $password,
        ];
        return $builder->insert($data);
    }

    public function get_user($username) {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('uid,email');
        $builder->where('username',$username);
        $query = $builder->get();
        $results = $query->getResultArray();
        return $results;
    }

    public function get_username($email, $password) {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('uid,username');
        $builder->where('email',$email);
        $builder->where('password',$password);
        $query = $builder->get();
        $results = $query->getResultArray();
        return $results;
    }
}
