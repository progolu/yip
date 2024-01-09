<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UsersModel;
class Dashboard extends BaseController
{
    public function index()
    {
        $usersModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);
        $data = [
            'title' => 'Dashboard',
            'userInfo' => $userInfo

        ];
        return view('admin/header')
            . view('admin/index',$data)
            . view('admin/footer');
    }
    public function add_product()
    {
        $usersModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);
        $data = [
            'title'=>'Dashboard',
            'userInfo' => $userInfo

        ];
        return view('admin/header')
            . view('admin/add-product',$data)
            . view('admin/footer');
    }
    public function users()
    {
        $model = new UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $model->find($loggedUserID);
        //$data['news'] = $model->getUsers();
        $datas = [
            'news' => $model->getUsers(),
            'users' => $model->paginate(5),
            'pager' => $model->pager
        ];
        $data = [
            'title'=>'Dashboard',
            'userInfo' => $userInfo

        ];
        return view('admin/header')
            . view('admin/users',$datas)
            . view('admin/footer');
    }
    public function products()
    {
        $model = new ProductModel();
        $data['news'] = $model->getProducts();

        $usersModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);
        // $data = [
        //     'title'=>'Dashboard',
        //     'userInfo' => $userInfo

        // ];
        return view('admin/header',$data)
            . view('admin/products')
            . view('admin/footer');
    }
    public function orders()
    {
        $usersModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);
        $data = [
            'title'=>'Dashboard',
            'userInfo' => $userInfo

        ];
        return view('admin/header',$data)
            . view('admin/orders')
            . view('admin/footer');
    }
      
}
