<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\CartModel;
use App\Models\ProductModel;
  
class CartController extends Controller
{
    public function index($type = null)
    {
        $session = session();
        $model = new CartModel();
        $productModel = new ProductModel();
        
        $cart = $model->findAll();

        foreach ($cart as $key => $item) {
            $product = $productModel->find($item['product']);
            $cart[$key]['product'] = $product;
        }
        
        $data['cart'] = $cart;
        $data['total'] = 0;
        foreach ($data['cart'] as $key => $value) {
            $data['total'] += $value['price'] * $value['quantity'];
        }
        $data['total'] = number_format($data['total'], 2);
        $data['user'] = $session->get('id');
        echo view('carts',  $data);
    }

    public function add() 
    {
        helper(['form']);
        $session = session();
        $rules = [
            'product'   => 'required',
            'price'   => 'required',
            'quantity'   => 'required',
        ];
          
        if($this->validate($rules)){
            $cartModel = new CartModel();
            $matchedCart = $cartModel->where('user', $session->get('id'))->where('product', $this->request->getVar('product'))->get()->getRow();
            if ($matchedCart) {
                echo $this->request->getVar('quantity') < 0;
                if ($this->request->getVar('quantity') < 0 && $matchedCart->quantity == 1) {
                    $cartModel->where('user', $session->get('id'))->where('product', $this->request->getVar('product'))->delete();
                } else {
                    $cartModel->where('user', $session->get('id'))->where('product', $this->request->getVar('product'))->set('quantity', $matchedCart->quantity + intval($this->request->getVar('quantity')))->update();
                }
            } else {
                $cartModel->insert([
                    'user'   => $session->get('id'),
                    'product'  => $this->request->getVar('product'),
                    'price'  => $this->request->getVar('price'),
                    'quantity'   => 1
                ]);
            }
            return redirect()->to('/products');
        }else{
            $data['validation'] = $this->validator;
            echo view('products', $data);
        }
    }

    public function cartAdd() 
    {
        helper(['form']);
        $session = session();
        $rules = [
            'product'   => 'required',
            'price'   => 'required',
            'quantity'   => 'required',
        ];
          
        if($this->validate($rules)){
            $cartModel = new CartModel();
            $matchedCart = $cartModel->where('user', $session->get('id'))->where('product', $this->request->getVar('product'))->get()->getRow();
            if ($matchedCart) {
                echo $this->request->getVar('quantity') < 0;
                if ($this->request->getVar('quantity') < 0 && $matchedCart->quantity == 1) {
                    $cartModel->where('user', $session->get('id'))->where('product', $this->request->getVar('product'))->delete();
                } else {
                    $cartModel->where('user', $session->get('id'))->where('product', $this->request->getVar('product'))->set('quantity', $matchedCart->quantity + intval($this->request->getVar('quantity')))->update();
                }
            } else {
                $cartModel->insert([
                    'user'   => $session->get('id'),
                    'product'  => $this->request->getVar('product'),
                    'price'  => $this->request->getVar('price'),
                    'quantity'   => 1
                ]);
            }
            return redirect()->to('/carts');
        }else{
            $data['validation'] = $this->validator;
            echo view('carts', $data);
        }
    }
}