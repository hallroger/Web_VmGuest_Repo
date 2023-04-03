<?php 
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class Non_crud_model 
{
   
    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }
    
    function allvmguest(){
        $this->db->table('vmguest')->get()->getResult();
    }
    public function truncate_table_backup()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('vmguest');

        $builder->truncate(); 


    }
    public function fetch_vmguest($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('vmguest');
        return $data = $builder->get();
    }
    
}