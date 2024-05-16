<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\CartModel;
  
class OrderController extends Controller
{
    // Method to display all orders.
    public function index($type = null)
    {
        $session = session();
        $model = new ProductModel();
        $orderModle = new OrderModel();
         // Retrieve all orders.
        $data['orders'] = $orderModle->findAll();
        echo view('orders', $data);
    }

     // Method to add a new order.
    public function add() 
    {
        helper(['form']);
        $session = session();
        // Define validation rules for adding an order.
        $rules = [
            'products'   => 'required',
            'price'   => 'required',
        ];
          
        // Validate the form input against the defined rules.
        if($this->validate($rules)){
            // If validation passes, process the order.
            $products = explode(",", $this->request->getVar('products'));
            foreach($products as $product){
                // Delete cart items corresponding to the ordered products.
                $cartModel = new CartModel();
                $cartModel->where('product', $product)->where('user', $session->get('id'))->delete();
            }
            $cartModel = new OrderModel();

            // Insert the order details into the database.
            $cartModel->insert([
                'user'   => $session->get('id'),
                'products'  => $this->request->getVar('products'),
                'price'  => $this->request->getVar('price'),
                'date'   => date('Y-m-d H:i:s'),
                'status' => 1
            ]);
            return redirect()->to('/checkout_success');
        }else{
            $data['validation'] = $this->validator;
            echo view('orders', $data);
        }
    }

    // Method to display the checkout success page.
    public function checkoutSuccess() 
    {
        $session = session();
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        echo view('checkout_success', $data);
    }

    // Method to display the checkout failed page.
    public function checkout_failed() 
    {
        $session = session();
        echo view('checkout_failed', $data);
    }
}