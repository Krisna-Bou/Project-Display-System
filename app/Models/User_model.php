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
        if (password_verify($password, $result['password'])) {
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

    public function new_user($email, $firstName, $lastName, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $data = [
            'email' => $email,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'password' => $password,
            'profileImage' => "/Project-Display/writable/uploads/img/default-user.png",
        ];
        return $builder->insert($data);
    }

    public function set_session($email) {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('uid, firstName, lastName');
        $builder->where('email', $email);
        $results = $builder->get()->getResultArray();
        return $results;
    }

    public function get_user_profile($uid) {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('uid, email, firstName, lastName, title, faculty, position, phone, profileImage');
        $builder->where('uid', $uid);
        $results = $builder->get()->getResultArray();
        return $results;
    }

    public function upload($uid, $profileImage)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('uid',$uid);
        $file = [
            'profileImage' => $profileImage,
        ];
        return $builder->update($file);
    }
}
