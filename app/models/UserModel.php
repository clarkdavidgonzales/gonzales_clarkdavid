<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'students'; // **Change to your actual table name**
    protected $primaryKey = 'id';
    protected $allowedFields = ['last_name', 'first_name', 'email'];
}