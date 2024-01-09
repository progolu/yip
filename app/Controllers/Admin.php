<?php namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\AdminModel;

use App\Libraries\Hash;
class Admin extends BaseController
{
	public function index()
	{
                return view('admin/login');
        // echo view('templates/admin-header');
        // echo view('admin/login');
        // echo view('templates/admin-footer');
	}
        public function register()
	{

        echo view('templates/admin-header');
        echo view('admin/register');
        echo view('templates/admin-footer');
	}
        function create()
        {
            helper('form');
            // helper(['url','form']);
            $model = new AdminModel();
            
    
          
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
                'username' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Enter username'
                        ]
                    ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[admin.email]',
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
                echo view('admin/register');
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
                        'username' => $this->request->getVar('username'),
                        'email' => $this->request->getVar('email'),
                        'password' => Hash::make('password'),
                        'avatar' =>$imageName,
                        'slug' => url_title($this->request->getVar('firstname')),
                    ]
                );
    
                $session = \Config\Services::session();
                $session->setFlashdata('success', 'Admin Profile Created Successfully');
                return redirect()->to('/admin/login');
            }
        }

        function check()
    {
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[admin.email]',
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
            return view('admin/login', ['validation' => $this->validator]);
        } else {
            //lets check user
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $usersModel = new \App\Models\AdminModel();
            //fetch user info based on requested email address
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::check($password, $user_info['password']);

            if ($check_password) {
                session()->setFlashdata('fail', 'Incorrect Password');
                return redirect()->to('admin/login')->withInput();
               
                   
            } else {
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('admin/index');
            }
        }
    }
    function logout()
    {
        if (session()->has('loggedUser')) {
                session()->remove('loggedUser');
           // session()->destroy('loggedUser');
            return redirect()->to('admin/login')->with('fail', 'You are logged out!');
        }
    }

}