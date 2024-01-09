<?php namespace App\Controllers;

use App\Models\ProductModel;
class Pages extends BaseController
{
	public function index()
	{
         $model = new ProductModel();
         $data['news'] = $model->getProducts();

        echo view('templates/header');
        echo view('pages/home',$data);
        echo view('templates/footer');
	}
    public function about()
    {
        echo view('templates/header');
        echo view('pages/about');
        echo view('templates/footer');
    }
    
    function showme($page = 'home'){
        if (! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
    {
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
        echo view('templates/header');
        echo view('pages/'.$page);
        echo view('templates/footer');
        
    }

	//--------------------------------------------------------------------

}