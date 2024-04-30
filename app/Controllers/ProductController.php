<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ProductModel;
  
class ProductController extends Controller
{
    public function index($type = null)
    {
        $session = session();
        $model = new ProductModel();
        if ($type) {
            $data['products'] = $model->where('type', $type)->findAll();
        } else {
            $data['products'] = $model->findAll();
        }
        echo view('products', $data);
    }
}