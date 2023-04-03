<?php 
namespace App\Models;

use CodeIgniter\Model;

class Vmguest_backup_all extends Model
{
   
    protected $table = 'vmguest_backup_all';
    protected $primaryKey = 'id_vmguest';
    protected $returnType = 'array';

    protected $allowedFields = ['date_time','name','state','status','managed','host','cluster',
    'provisioned_space','used_space','guest_os','compability','memory_size','reservation','cpu','nics','uptime','ip_address','vmware_tools_version_status'
    ,'vmware_tools_running_status','host_cpu','host_memory','guest_mem','dns_name','evc_mode','uuid','notes','alarm_actions','ha_protected','need_consolidation','vm_storage'
    ,'encryption','tpm','vbs'];
    protected $useTimestamps = true;
    protected $createdField  = 'time_data';
    protected $updatedField  = 'time_update';



    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    
 
    
}