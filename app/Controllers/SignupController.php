<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SignupController extends Controller
{
    // Method to display the signup form.
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('signup', $data);
    }
  
    // Method to process and store user signup data.
    public function store()
    {
        helper(['form']);
        // Define validation rules for the signup form fields.
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
        
        // Validate the form input against the defined rules.
        if($this->validate($rules)){
            $userModel = new UserModel();
            // Retrieve form data.
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            // Save the user data to the database.
            $userModel->save($data);
            return redirect()->to('/signin');
        }else{
            // If validation fails, pass validation errors to the signup view.
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
          
    }
  
}