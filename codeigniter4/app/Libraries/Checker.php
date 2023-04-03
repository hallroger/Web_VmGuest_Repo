<?php
namespace App\Libraries;
use App\Models\Vmguest_backup;
use App\Models\Vmguest;

class Checker{

    public function check_to_backup ($data){
            $checker = true;
            $vmguest = new Vmguest();
            $tmp = $vmguest->findAll();
           
            foreach ($tmp as $temp){
                if ($data == $temp['name']){
                    
                    return $temp;
                }
            }
            
           
    }

    
}