<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pname', 
        'pdescription', 
        'price',
        'slug',
        'picture',
        'pcategory',
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
    public function getProducts($slug = null)
    {
        if (!$slug) {
            return $this->orderBy('created_at', 'DESC')->findAll();
        }

        return $this->asArray()
            ->where(['slug' => $slug])
            ->first();
    }
    public function getRelatedProducts($pcategory = null)
    {
        if (!$pcategory) {
            return $this->orderBy('pcategory', 'DESC')->findAll();
        }

        return $this->asArray()
            ->where(['slug' => $pcategory])
            ->first();
    }
}
?>