<?php 
namespace App\Models;

use CodeIgniter\Model;
//CRUD Model for VMGUEST BACKUP table
class Users_backup extends Model
{
   
    protected $table = 'vmguest_backup';
    protected $primaryKey = 'id_vmguest';
    protected $returnType = 'array';

    protected $allowedFields = ['time_data','name','state','status','managed','host','cluster',
    'provisioned_space','used_space','guest_os','compability','memory_size','reservation','cpu','nics','uptime','ip_address','vmware_tools_version_status'
    ,'vmware_tools_running_status','host_cpu','host_memory','guest_mem','dns_name','evc_mode','uuid','notes','alarm_actions','ha_protected','need_consolidation','vm_storage'
    ,'encryption','tpm','vbs'];
    protected $useTimestamps = false;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    
 
    
}