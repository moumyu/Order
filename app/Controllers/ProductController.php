<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\CartModel;
  
class ProductController extends Controller
{
    // Method to display the products.
    public function index($type = null)
    {
        $session = session();
        $model = new ProductModel();
        $cartModle = new CartModel();
        $data['cart'] = $cartModle->where('user', $session->get('id'))->findAll();
        $data['total'] = 0;
         // Calculate the total cost of items in the cart.
        foreach ($data['cart'] as $key => $value) {
            $data['total'] += $value['price'] * $value['quantity'];
        }
        $data['total'] = number_format($data['total'], 2);
         // Retrieve products based on the provided type, if any.
        if ($type) {
            $data['products'] = $model->where('type', $type)->findAll();
        } else {
            // If no type is provided, retrieve all products.
            $data['products'] = $model->findAll();
        }
        // Load the products view and pass the data to it.
        echo view('products', $data);
    }
}