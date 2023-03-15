<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password', 'role'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getUserByMailOrUsername($email) {
        // si esta sentencia SQL devuelve null o falso, que equivaldria que no exitste el usuario retorna false $this->orWhere('email',$email)->orWhere('name',$email)->first();
        $sql = $this->orWhere('email',$email)->orWhere('name',$email)->first();
        if ($sql) {
            return $sql;
        } else {
            return false;
        }
    }

    public function  getAllUsers() {
        $sql = $this->findAll();
        if ($sql) {
            return $sql;
        } else {
            return false;
        }
    }

    public function  getUserById($id) {
        $sql = $this->where('id',$id)->first();
        if ($sql) {
            return $sql;
        } else {
            return false;
        }
    }

    public function updateRole($email, $role)
    {
        $sql = $this->where('email', $email)->set('role', $role)->update();
        if ($sql) {
            return true;
        } else {
            return false;
        }
    }

}


