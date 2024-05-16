<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\UserModel;
  
class AdminOrdersController extends Controller
{
    // Method to display all orders in the admin panel.
    public function index()
    {
        // Retrieve the session object.
        $session = session();
        // Create instances of the OrderModel, ProductModel, and UserModel.
        $model = new OrderModel();
        $productModel = new ProductModel();
        $userModel = new UserModel();
        $orders = $model->findAll(); // get all orders

        // Iterate through each order.
        foreach ($orders as $key => $item) {
            $orderProducts = [];
            $products = explode(",", $item['products']);
            foreach($products as $product){
                $productModel = new ProductModel();
                // Retrieve the product details using its ID and add it to the array.
                $orderProducts[] = $productModel->find($product);
            }

            $user = $userModel->find($item['user']);
            // Update the order array with the product details and user details.
            $orders[$key]['products'] = $orderProducts;
            $orders[$key]['user'] = $user;
        }
        $data['orders'] = $orders;
        echo view('admin_orders', $data);
    }

    // Method to add a new product.
    public function add() 
    {
        helper(['form']);
        // Define validation rules for the product fields.
        $rules = [
            'name'    => 'required|min_length[2]|max_length[50]',
            'price'   => 'required|decimal',
            'image'   => 'required',
            'type'    => 'required'
        ];
          
        if($this->validate($rules)){
            $productModel = new ProductModel();
            // Retrieve form data.
            $data = [
                'name'   => $this->request->getVar('name'),
                'price'  => $this->request->getVar('price'),
                'type'   => $this->request->getVar('type'),
                'image'   => $this->request->getVar('image'),
            ];
            $productModel->save($data);
            return redirect()->to('/admin-products');
        }else{
            $data['validation'] = $this->validator;
            echo view('admin_add_product', $data);
        }
    }

    // Method to mark an order as finished.
    public function finish($id = null)
    {
        $session = session();
        $model = new OrderModel();
        $model->where('id', $id)->set('status', 2)->update();
        return redirect()->to('/admin-orders');
    }
}