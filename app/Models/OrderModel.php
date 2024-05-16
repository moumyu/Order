<?php 
namespace App\Models;  
use CodeIgniter\Model;

// OrdertModel class
class OrderModel extends Model {
    protected $table = 'orders';
    
    protected $allowedFields = [
        'user',
        'products',
        'price',
        'date',
        'status'
    ];
}