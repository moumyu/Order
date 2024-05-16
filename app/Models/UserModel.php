<?php 
namespace App\Models;  
use CodeIgniter\Model;

// UserModel class
class UserModel extends Model{
    protected $table = 'users';
    
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'created_at'
    ];
}