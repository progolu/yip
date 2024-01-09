<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'firstname', 
        'lastname', 
        'email',
        'slug',
        'avatar',
        'password',
       'created_at',
    
    ];
    public function getPosts($slug = null){
        if(!$slug){
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
    }
    public function getUsers($slug = null)
    {
        if (!$slug) {
            return $this->orderBy('created_at', 'DESC')->findAll();
        }

        return $this->asArray()
            ->where(['slug' => $slug])
            ->first();
    }
}
?>