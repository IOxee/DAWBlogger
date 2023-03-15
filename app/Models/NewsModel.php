<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'news';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'body', 'slug'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'published_at';
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

    public function getNews($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getNewsByID($id = false)
    {
        if ($id === false)
        {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function deleteNews($id) {
        return $this->delete($id);
    }

    public function getAllPaged($nElements, $order, $sort_order) {

        if ($order == "")
            return $this->select(['id', 'title', 'body', 'published_at'])->paginate($nElements);
        else
            return $this->select(['id', 'title', 'body', 'published_at'])->orderBy($order, $sort_order)->paginate($nElements);
    }

    public function getByTitleOrText ($search, $order, $sort_order) {
        if ($order == "")
            return $this->select(['id', 'title', 'body', 'published_at'])->orLike('title', $search, 'both', true)->orLike('body', $search, 'both', true);
        else
            return $this->select(['id', 'title', 'body', 'published_at'])
                ->orLike('title', $search, 'both', true)
                ->orLike('body', $search, 'both', true)->orderBy($order, $sort_order);
    }
}


