<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
// ProductModel class
class ProductModel extends Model {
    protected $table = 'products';
    
    protected $allowedFields = [
        'name',
        'price',
        'image',
        'type'
    ];
}