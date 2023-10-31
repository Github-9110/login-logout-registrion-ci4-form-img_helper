<?php 
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model{
       protected $table ='users';
       protected $primaryKey = 'id';
       protected $allowedFields =['name','mobile','email','img_name','is_deleted','password'];
}