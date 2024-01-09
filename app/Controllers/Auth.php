<?php

namespace App\Controllers;

use App\Libraries\Hash;
//use App\Models\UsersModel;
use App\Models\UsersModel;


class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
	public function index()
	{
        // $model = new BlogModel();
        // $data['news'] = $model->getPosts();
        return view('pages/login');
        // echo view('templates/header');
        // echo view('pages/login');
        // echo view('templates/footer');
	}

    public function register()
    {
        echo view('templates/header');
        echo view('pages/register');
        echo view('templates/footer');
    }
    function create()
    {
        helper('form');
        // helper(['url','form']);
        $model = new UsersModel();
        

      
        //start good code
        $file = $this->request->getFile('avatar');
        if (!$this->validate([
            'firstname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Enter your first Name'
                ]
            ],
            'lastname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Enter your last Name'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'You must enter a valid email',
                    'is_unique' => 'Email is already taken'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be 5 character in length',
                    'max_length' => 'Password must not have more than 12 character',
                ]
            ],
            'cpassword' => [
                'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors' => [
                    'required' => 'Confirm Password is required',
                    'min_length' => ' Confirm Password must be 5 character in length',
                    'max_length' => 'Confirm Password must not be more than 12 character',
                    'matches' => 'Password Does not match'
                ]
            ],
            'avatar' => [
                'rules' => 'uploaded[avatar]|max_size[avatar,1024]|mime_in[avatar,image/jpg,image/jpeg,image/svg,image/webp,image/png]|is_image[avatar]',
                'errors' => [
                    'uploaded' => 'Preview image is required! Please choose an image first!',
                    'max_size' => 'The size of this image is too large. The image must have less than 1MB size',
                    'mime_in' => 'Your upload does not have a valid image format',
                    'is_image' => 'Your file is not allowed! Please use an image!'
                ]
            ],
        ])) {
            echo view('templates/header');
            echo view('pages/register');
            echo view('templates/footer');
        } else {
                // get image
        $avatar = $this->request->getFile('avatar');
        // name
        $imageName = $avatar->getRandomName();
        // moving
        $avatar->move('assets/img', $imageName);

            $model->save(
                [
                    
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => Hash::make('password'),
                    'avatar' =>$imageName,
                    'slug' => url_title($this->request->getVar('firstname')),
                ]
            );


            //end good code

            $session = \Config\Services::session();
            $session->setFlashdata('success', 'User Created Successfully');

            return redirect()->to('/pages/login');

        }
    }

    function check()
    {
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter a valid email address',
                    'is_not_unique' => 'This is not registered on our server'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have atleast 5 character in length',
                    'max_length' => 'Password must not have more than 12 character in length'
                ]
            ]
        ]);

        if (!$validation) {
            return view('pages/login', ['validation' => $this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $usersModel = new \App\Models\UsersModel();
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::check($password, $user_info['password']);

            if ($check_password) {
                session()->setFlashdata('fail', 'Incorrect Password');
                return redirect()->to('pages/login')->withInput();
            } else {
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('pages/dashboard');
            }
        }
    }
    public function dashboard()
    {
        $usersModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);
        $data = [
            'title'=>'Dashboard',
            'userInfo'=>$userInfo
                
        ];
        return view('pages/header', )
            . view('pages/dashboard',$data )
            . view('admin/footer');
    }
    function edited($id){
       
        //$model = new UsersModel();
        $usersModel = new \App\Models\UsersModel();
        $data['users'] = $usersModel->find($id);
        return view('/upgrade',$data);
    }
    public function update($id){
        //$model = new UsersModel();
        $usersModel = new \App\Models\UsersModel();
        $avatar = $this->request->getFile('avatar');
        // name
        $imageName = $avatar->getRandomName();
        // moving
        $avatar->move('assets/img', $imageName);
        $data = [
            'firstname'=> $this->request->getPost('firstname'),
            'lastname'=> $this->request->getPost('lastname'),
            'email'=> $this->request->getPost('email'),
            'avatar' =>$imageName,
        ];
        $usersModel->update($id, $data);
        $session = \Config\Services::session();
        $session->setFlashdata('success', 'User Updated Successfully');
        return redirect()->to('/');
    }
    function post($slug)
    {

        $model = new UsersModel();

        $data['post'] = $model->getPosts($slug);

        echo view('templates/header', $data);
        echo view('admin/user-view');
        echo view('templates/footer');
    }
    public function delete($id)
    {
        $model = new UsersModel();
        $model->delete($id);
        $session = \Config\Services::session();
        $session->setFlashdata('success', 'User Deleted Successfully');
        return redirect()->to('admin/users');
    }
    function logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            //session()->destroy('loggedUser');
            return redirect()->to('pages/login')->with('fail', 'You are logged out!');
        }
    }
    public function profile()
    {
        $usersModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);
        $data = [
            'title'=>'Dashboard',
            'userInfo'=>$userInfo
                
        ];
        return view('pages/header')
            . view('pages/profile',$data)
            . view('admin/footer');
    }
    public function orders()
    {
        $usersModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);
        $data = [
            'title'=>'Dashboard',
            'userInfo'=>$userInfo
                
        ];
        return view('pages/header')
            . view('pages/order',$data)
            . view('admin/footer');
    }
}
