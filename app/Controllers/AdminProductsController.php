<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ProductModel;
  
class AdminProductsController extends Controller
{
    // Method to display all products in the admin panel.
    public function index()
    {
        $session = session();
        $model = new ProductModel();
        $data['products'] = $model->orderBy('id', 'DESC')->findAll(); // get all products
        echo view('admin_products', $data);
    }

    // Method to display the add product form.
    public function addView() 
    {
        helper(['form']);
        $session = session();
        $data = [];
        echo view('admin_add_product');
    }

    // Method to add a new product.
    public function add() 
    {
        helper(['form']);
        $rules = [
            'name'    => 'required|min_length[2]|max_length[50]',
            'price'   => 'required|decimal',
            'image'   => 'required',
            'type'    => 'required'
        ];
          
        if($this->validate($rules)){
            $productModel = new ProductModel();
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

    // Method to remove a product.
    public function remove($id = null)
    {
        $session = session();
        $model = new ProductModel();
        $model->delete($id);
        return redirect()->to('/admin-products');
    }

    // Method to display the edit product form.
    public function edit($id = null)
    {
        helper(['form']);
        $session = session();
        $model = new ProductModel();
        $data['product'] = $model->where('id', $id)->first();
        echo view('admin_edit_product', $data);
    }

    // Method to update a product.
    public function update()
    {
        helper(['form']);
        $rules = [
            'name'    => 'required|min_length[2]|max_length[50]',
            'price'   => 'required|decimal',
            'type'    => 'required'
        ];
          
        if($this->validate($rules))
        {
            $productModel = new ProductModel();
            $data = [
                'name'   => $this->request->getVar('name'),
                'price'  => $this->request->getVar('price'),
                'type'   => $this->request->getVar('type'),
            ];
            $productModel->update($this->request->getVar('id'), $data);
            return redirect()->to('/admin-products');
        }else{
            $data['validation'] = $this->validator;
            echo view('admin_edit_product', $data);
        }
    }
}