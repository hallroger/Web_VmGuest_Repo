<?php 
namespace App\Models;

use CodeIgniter\Model;

class Log extends Model
{
    protected $table = 'log_db';
    protected $primaryKey = 'id_log';
    protected $returnType = 'array';

    protected $allowedFields = ['id_log','time_data','count_data','count_on','count_off'];
    protected $useTimestamps = false;

    
    
    

   

    
    
}