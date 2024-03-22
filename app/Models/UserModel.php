<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKet = 'id';
    protected $allowedFields = ['name', 'email'];
}
