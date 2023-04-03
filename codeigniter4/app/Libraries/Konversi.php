<?php 
namespace App\Libraries;
use App\Models\Log;


class Konversi
{
    public function convert_size ($data){
        #double
        $sub1 = "MB";
        $sub2 = "TB";
        if (strpos($data,$sub1) !== false){
    
          $stringvar = $data;
          $floatvar = floatval($stringvar);
          return $data = $floatvar / 1000;
  
        }else if (strpos($data,$sub2) == true){
          $stringvar = $data;
          $floatvar = floatval($stringvar);
          return $data = $floatvar * 1000; 
        }else if (strpos($data,"B") == true){
            $stringvar = $data;
            $floatvar = floatval($stringvar);
            return $data = $floatvar; 
        }else if (strpos($data,"GB") == true){

            $data = intval($data);
            return $data;
        }else if (is_null($data) == false){ 
            return $data = 0.0;
        }else{
            echo("Please Fix Function");
        }
      }
      public function convert_memory ($data){
          #double
          if (strpos($data,"GB") == true){
          $stringvar = $data;
          $floatvar = floatval($stringvar);
          return $data = $floatvar ;
        }else if (is_null($data) == false){ 
              return $data = 0.0;
        }
      }
      public function convert_reservation($data){
          #int
          $stringvar = $data;
          $intvar = intval($stringvar);
          return $data = $intvar ;
      }
      public function convert_to_int($data){
          #int
          $stringvar = $data;
          $intvar = intval($stringvar);
          return $data = $intvar ;
      }
   
      public function convert_hostcpu($data){
          #float
          if (strpos($data,"GHz") == true){
            $stringvar = $data;
            $floatvar = floatval($stringvar);
            return $data = $floatvar * 1000;
          }else{
            $stringvar = $data;
            $floatvar = floatval($stringvar);
            return $floatvar;
          }
      }
      public function convert_to_float($data){
          #float
          $stringvar = $data;
          $floatvar = floatval($stringvar);
          return $floatvar;
      }

      public function convert_status($data){
          $count = array();
          $count_on = 0;
          $count_off = 0;
          $log = new Log();
          
          #int
          if ($data == 'Powered On'){
            $data = 1;
            
            return intval($data);
          }else if ($data=='Powered Off'){
            $data = 0;
            
            return intval($data);
          }
         


      }
}
