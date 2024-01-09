<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'firstname', 
        'lastname', 
        'email',
        'username',
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
}
?>