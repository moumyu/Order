<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SigninController extends Controller
{
    // Method to display the signin form.
    public function index()
    {
        // Load the form helper.
        helper(['form']);

        // Load the signin view.
        echo view('signin');
    } 
  
    // Method to authenticate user login.
    public function loginAuth()
    {
        // Retrieve the session object.
        $session = session();
         // Create an instance of UserModel.
        $userModel = new UserModel();
        // Retrieve email and password from the login form.
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        // Retrieve user data based on the provided email.
        $data = $userModel->where('email', $email)->first();
        
        if($data){
             // If user data is found, verify the password.
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                // If password is correct, set session data and redirect based on user role.
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'role' => $data['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                if ($ses_data['role'] == 'admin') {
                    return redirect()->to('/admin-products');
                } else {
                    return redirect()->to('/products');
                }
            }else{
                // If password is incorrect, set flash message and redirect to signin page.
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            // If password is incorrect, set flash message and redirect to signin page.
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }

    // Method to logout the user.
    public function logout()
    {
        // Retrieve the session object and destroy the session data.
        $session = session();
        $session->destroy();
        return redirect()->to('/signin');
    }
}