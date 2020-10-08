<?php namespace App\Models;

use CodeIgniter\Model;

class Program_Studi_Model extends Model {
    private $table = 'prodi';
    public function __construct()
    {
        
    }

    public function get()
    {
        
        return $this->db->table('prodi')->get();
    }
}