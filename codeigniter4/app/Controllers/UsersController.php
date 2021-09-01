<?php namespace App\Controllers;

use App\Models\Users;
use App\Models\Log;
use App\Models\Users_backup;
use App\Models\Users_backup_all;
use App\Libraries\Konversi;

class UsersController extends BaseController{
	
	public function index(){
		## for Home and Graph
      	$users = new Users();
		$log = new Log();
      	$data['users'] = $users->findAll();
		$data['log'] = $log->findAll(); 
				
		

      	return view('HOME',$data);
		  //change to home after finish with WIP
	}
	public function table()
	{
		$users = new Users();
		$log = new Log();
		
      	$data['users'] = $users->findAll();
		$data['log'] = $log->findAll();
		
		

      	return view('index',$data);
	}
	public function table_backup()
	{
		$users = new Users();
		$log = new Log();
		$backup = new Users_backup();
      	$data['users'] = $users->findAll();
		$data['log'] = $log->findAll();
		$data['backup']  = $backup->findall();
		

      	return view('comparasi',$data);
	}
	public function table_backup_all()
	{
		
		$log = new Log();
		
		$backup_all = new Users_backup_all();
      
		$data['log'] = $log->findAll();
		
		$data['backup_all']  = $backup_all->findall();

		

      	return view('backup_all',$data);
	}
	
	// File upload and Insert records
	public function importFile(){
		//deklarasi semua yang dipakai
		$konversi  = new Konversi(); //library konversi
		$log = new Log();
		$users = new Users();
		$backup = new Users_backup(); //Model CRUD for Backup
		$backup_all = new Users_backup_all(); //Model CRUD for Backup All
		$count_on = 0;
		$count_off = 0;
     	// Validation
	    $input = $this->validate([
	        'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,csv],'
	    ]);
		

     	if (!$input) { // Not valid
         	$data['validation'] = $this->validator; 

         	return view('index',$data); 
     	}else{ // Valid
         	if($file = $this->request->getFile('file')) {
            	if ($file->isValid() && ! $file->hasMoved()) {

               		// Get random file name
               		$newName = $file->getRandomName(); 

               		// Store file in public/csvfile/ folder
               		$file->move('../public/csvfile', $newName);
               		
               		// Reading file
               		$file = fopen("../public/csvfile/".$newName,"r");
               		$i = 0;
               		$numberOfFields = 32; // Total number of fields

               		$importData_arr = array();
					//$temp_arr = array();
     				
     				// Initialize $importData_arr Array
                	while (($filedata = fgetcsv($file, 10000, ",")) !== FALSE) {
					
                   		$num = count($filedata);
						 
						
						
                   		if($i > 0 && $num == $numberOfFields){  // Skip first row & check number of fields
		                 $importData_arr[$i]['name'] = $filedata[0];
                         $importData_arr[$i]['state'] = $filedata[1];
						 $importData_arr[$i]['state_int'] = $filedata[1];
                         $importData_arr[$i]['status'] = $filedata[2];
						 
                         $importData_arr[$i]['managed'] = $filedata[3];
                         $importData_arr[$i]['host'] = $filedata[4];
                         $importData_arr[$i]['cluster'] = $filedata[5];
                         $importData_arr[$i]['provisioned_space'] = $filedata[6];
						
                         $importData_arr[$i]['used_space'] = $filedata[7];
						
                         $importData_arr[$i]['guest_os'] = $filedata[8];
                         $importData_arr[$i]['compatibility'] = $filedata[9];
                         $importData_arr[$i]['memory_size'] = $filedata[10];
                         $importData_arr[$i]['reservation'] = $filedata[11];
                         $importData_arr[$i]['cpu'] = $filedata[12];
						
                         $importData_arr[$i]['nics'] = $filedata[13];
                         $importData_arr[$i]['uptime'] = $filedata[14];
                         $importData_arr[$i]['ip_address'] = $filedata[15];
                         $importData_arr[$i]['vmware_tools_version_status'] = $filedata[16];
                         $importData_arr[$i]['vmware_tools_running_status'] = $filedata[17];
                         $importData_arr[$i]['host_cpu'] = $filedata[18];
                         $importData_arr[$i]['host_memory'] = $filedata[19];
                         $importData_arr[$i]['guest_mem'] = $filedata[20];
                         $importData_arr[$i]['dns_name'] = $filedata[21];
                         $importData_arr[$i]['evc_mode'] = $filedata[22];
                         $importData_arr[$i]['uuid'] = $filedata[23];
                         $importData_arr[$i]['notes'] = $filedata[24];
                         $importData_arr[$i]['alarm_actions'] = $filedata[25];
                         $importData_arr[$i]['ha_protected'] = $filedata[26];
                         $importData_arr[$i]['need_consolidation'] = $filedata[27];
                         $importData_arr[$i]['vm_storage'] = $filedata[28];
                         $importData_arr[$i]['encryption'] = $filedata[29];
                         $importData_arr[$i]['tpm'] = $filedata[30];
                         $importData_arr[$i]['vbs'] = $filedata[31];
						 

						 #Konversi Data
						 $importData_arr[$i]['state_int'] = $konversi->convert_status( $importData_arr[$i]['state_int']);
						if ($importData_arr[$i]['state_int'] == 1){
							$count_on++;
						}else if ($importData_arr[$i]['state_int'] == 0){

					
							$count_off++;
						};
						 $importData_arr[$i]['provisioned_space'] = $konversi->convert_size( $importData_arr[$i]['provisioned_space']);
						
						 $importData_arr[$i]['used_space'] = $konversi->convert_size( $importData_arr[$i]['used_space']);
					
						 $importData_arr[$i]['memory_size'] = $konversi->convert_memory( $importData_arr[$i]['memory_size']);
						 
						 $importData_arr[$i]['reservation'] = $konversi->convert_to_int( $importData_arr[$i]['reservation']);
					
						 $importData_arr[$i]['cpu'] = $konversi->convert_to_int( $importData_arr[$i]['cpu']);
						 
						 $importData_arr[$i]['nics'] = $konversi->convert_to_int( $importData_arr[$i]['nics']);
					
						 $importData_arr[$i]['uptime'] = $konversi->convert_to_int( $importData_arr[$i]['uptime']);
						 
						 $importData_arr[$i]['host_cpu'] = $konversi->convert_hostcpu( $importData_arr[$i]['host_cpu']);
						
						 $importData_arr[$i]['host_memory'] = $konversi->convert_size( $importData_arr[$i]['host_memory']);
						
						 $importData_arr[$i]['guest_mem'] = $konversi->convert_to_int( $importData_arr[$i]['guest_mem']); 
                      
                   		}
						
                   		$i++;
                 
                	}
                	fclose($file);
					//end of while
					
					$data = array();
					
	              //backup table vmguest
	                $count = 0;
					
					$count_table = 0;
					$data_temp = array();
					$data_temp2 = array();
					
					$count_table = $users->countAllResults();
					$data_temp = $users->orderBy('id_vmguest')->findAll();
					$data_temp2 =  $backup->orderBy('id_vmguest')->findAll();
					foreach($data_temp2 as $userdata){
						
						$backup_all->insert($userdata);
					};
				if ($count_table != 0){
						$backup->truncate();
						foreach($data_temp as $userdata){
							$userdata['time_data'] = date("Y.m.d H.i.s");
							$backup->insert($userdata);
						};
						

				}
					
					  // Insert data
					  $users->truncate();
	                foreach($importData_arr as $userdata){
						
	                    $count++;
	                	$users->insert($userdata);
	                    
	                
				}
					$data_temp = array();
					$count_temp = 0;
					$count_temp = $log->countAllResults();
					
					
					
					
					
					$data_temp =$log->find($count_temp); //data yang dikeluarkan string
					if ($count_temp != 0){
						$count_temp = $konversi->convert_to_int($data_temp['count_data']);
						
					}
					$count_tmp = $count + $count_temp;
					
					$time_data = date("Y.m.d H.i.s");
					$log_time[1]['time_data'] = $time_data;
					$data = [
						'time_data' => $time_data,
						'count_current' => $count,
						'count_data' => $count_tmp,
						'count_on' => $count_on,
						'count_off' => $count_off
						
						
					];
					

				
				
					$log->insert($data);
					
               		// Set Session
               		session()->setFlashdata('message', $count.' Record inserted successfully!');
               		session()->setFlashdata('alert-class', 'alert-success');

            	}else{
	               // Set Session
	               session()->setFlashdata('message', 'File not imported.');
	               session()->setFlashdata('alert-class', 'alert-danger');
	            }
	        }else{
	            // Set Session
	            session()->setFlashdata('message', 'File not imported.');
	            session()->setFlashdata('alert-class', 'alert-danger');
	        }

     	} //endif valid
  
     	return redirect()->route('/'); 
   	} //endif  not valid
	
	
}