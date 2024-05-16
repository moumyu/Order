<?php 
namespace App\Models;  
use CodeIgniter\Model;

// CarModel class
class CartModel extends Model {
    protected $table = 'carts';
    
    protected $allowedFields = [
        'user',
        'product',
        'quantity',
        'price'
    ];
}