<?php

namespace App\Controllers;

//use App\Models\UsersModel;
use App\Models\ProductModel;


class Product extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    // public function index()
	// {
    //     $model = new ProductModel();
    //     $data['news'] = $model->getPosts();

    //     echo view('admin/header', $data);
    //     echo view('admin/products');
    //     echo view('admin/footer');
	// }
    function post($slug)
    {

        $model = new ProductModel();
        $data['post'] = $model->getPosts($slug);
       // $datas['news'] = $model->getProducts();
        $datas['news'] = $model->getRelatedProducts();

        echo view('templates/header', $data);
        echo view('pages/product-view',$datas);
        echo view('templates/footer');
    }
    function create()
    {
        helper('form');
        // helper(['url','form']);
        $model = new ProductModel();

        $file = $this->request->getFile('picture');
        if (!$this->validate([
            'pname' => [
                'rules' => 'required|is_unique[products.pname]',
                'errors' => [
                    'required' => 'Enter product Name',
                    'is_unique' => 'Product already exist'
                ]
            ],
            'pdescription' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Enter product description'
                ]
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Price is required'
                ]
            ],
            'pcategory' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product category is required'
                ]
            ],
            'picture' => [
                'rules' => 'uploaded[picture]|max_size[picture,1024]|mime_in[picture,image/jpg,image/jpeg,image/svg,image/webp,image/png]|is_image[picture]',
                'errors' => [
                    'uploaded' => 'Preview image is required! Please choose an image first!',
                    'max_size' => 'The size of this image is too large. The image must have less than 1MB size',
                    'mime_in' => 'Your upload does not have a valid image format',
                    'is_image' => 'Your file is not allowed! Please use an image!'
                ]
            ],
        ])) {
            echo view('admin/header');
            echo view('admin/add-product');
            echo view('admin/footer');
        } else {
                // get image
        $avatar = $this->request->getFile('picture');
        // name
        $imageName = $avatar->getRandomName();
        // moving
        $avatar->move('assets/img', $imageName);

            $model->save(
                [              
                    'pname' => $this->request->getVar('pname'),
                    'pdescription' => $this->request->getVar('pdescription'),
                    'price' => $this->request->getVar('price'),
                    'pcategory' => $this->request->getVar('pcategory'),
                    'picture' =>$imageName,
                    'slug' => url_title($this->request->getVar('pname')),
                ]
            );
            $session = \Config\Services::session();
            $session->setFlashdata('success', 'Product Created Successfully');
            return redirect()->to('admin/index');
        }
    }

    function edited($id){
       
        //$model = new UsersModel();
        $usersModel = new \App\Models\ProductModel();
        $data['products'] = $usersModel->find($id);
        return view('admin/edit-product',$data);
    }
    public function update($id){
        //$model = new UsersModel();
        $usersModel = new \App\Models\ProductModel();
        $avatar = $this->request->getFile('picture');
        // name
        $imageName = $avatar->getRandomName();
        // moving
        $avatar->move('assets/img', $imageName);
        $data = [
            'pname'=> $this->request->getPost('pname'),
            'pdescription'=> $this->request->getPost('pdescription'),
            'pcategory'=> $this->request->getPost('pcategory'),
            'price'=> $this->request->getPost('price'),
            'picture' =>$imageName,
        ];
        $usersModel->update($id, $data);
        $session = \Config\Services::session();
        $session->setFlashdata('success', 'Product Updated Successfully');

        return redirect()->to('admin/index');

        
    }
    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);
        $session = \Config\Services::session();
        $session->setFlashdata('success', 'Product Deleted Successfully');
        return redirect()->to('admin/products');
    }
}
