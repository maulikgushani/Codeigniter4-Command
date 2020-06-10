<?php namespace App\Models;

use CodeIgniter\Model;

class @:@ extends Model
{
    protected $table      = '@table@';
    protected $primaryKey = 'id';

    protected $allowedFields = [];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}