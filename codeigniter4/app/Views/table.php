<?php

use App\Controllers\UsersController;
?>
<!DOCTYPE html>
<head>
<title>Table</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- MDB CDN -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<!-- CDN DATATABLE -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>


<style>
  .my-custom-scrollbar {
position: relative;
height: 1500px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}

.padding{
    padding: 24px;
}
.dtHorizontalExampleWrapper {
max-width: 600px;
margin: 0 auto;
}
#dtHorizontalExample th, td {
white-space: nowrap;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}


  </style>
</head>
<body class= >
    <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="/favicon.ico" width="30" height="30" alt="">
  <a class="navbar-brand" href="<?=site_url('/')?>">VMGUEST
  </a>
 
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <a class="nav-link" href="<?=site_url('/')?>">Home </a>
        <li class="nav-item active">
      <li class="nav-item">
        <a class="nav-link" href=<?=site_url('/table')?>>Table & Upload<span class="sr-only">(current)</span></a>
        </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('/table_backup')?>">Comparasi</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?=site_url('/table_backup_all')?>">Data Backup </a>
      </li>
    </ul>
  </div>
</nav>
<div class="padding">
    <div class="row">
          <div class="col-md-12 col-sm-12 padding">
            <?php 
            // Display Response
            if(session()->has('message')){
            ?>
            <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                   <?= session()->getFlashdata('message') ?>
            </div>
            <?php
            }
            ?>
             
            <?php $validation = \Config\Services::validation(); ?>

            <form method="post" action="<?=site_url('users/importFile')?>" enctype="multipart/form-data">

                   <?= csrf_field(); ?>
                   <div class="form-group">
                      <label for="file">File:</label>

                      <input type="file" class="form-control" id="file" name="file" />
                      <!-- Error -->
                      <?php if( $validation->getError('file') ) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('file'); ?>
                    </div>
                      <?php }?>

                   </div>

                   <input type="submit" class="btn btn-success" name="submit" value="Import CSV">
            </form>
          </div>
    </div>
  

    <div class="row padding">

        <!-- VM list -->
        <script>
            $(document).ready( function () {
              $('#table_data').DataTable({
                  "scrollY": "1400px",
                  "scrollCollapse": true,
                   "scrollX": true,
                   scroller: {
                      loadingIndicator: true
                     },
                    defRender: true,
                  
                  
            });
            $('.dataTables_length').addClass('bs-select');
            } );
          </script>
        <div class="col-md-80 col-sm-70 mt-4" >

            <h3 class="mb-4">VMGuest List</h3>
            <?php
                $temp3;
                $count = count($log);
                if ($count == 0){
                  $temp3 = '00-00-0000';
                }else{
                  $temp3 = $log[$count-1]['time_data'];
                }
                ?>
               
                <h3 >Current Data: <?=$temp3;?></h3>
           
            <div class = "table-resposive -sm text-wrap table-wrapper-scroll-y my-custom-scrollbar" cellspacing="0"width="100%"> 
            <table id = 'table_data' class = "table table-bordered table-dark table-sm table-hover">
                <thead >
                    <tr>
                        <th scope="col">No VMGuest</th>
                        <th scope="col">Name</th>
                        <th scope="col">State</th>
                        <th scope="col">Managed</th>
                        <th scope="col">Host</th>
                        <th scope="col">Cluster</th>
                        <th scope="col">Provisioned Space (GB)</th>
                        <th scope="col">Used Space (GB)</th>
                        <th scope="col"> Guest OS</th>
                        <th scope="col">Compatibility</th>
                        <th scope="col">Memory Size (GB)</th>
                        <th scope="col">Reservation</th>
                        <th scope="col">CPUs</th>
                        <th scope="col">NICs</th>
                        <th scope="col">Uptime (Days)</th>
                        <th scope="col">IP Address</th>
                        <th scope="col">VMware Tools Version Status</th>
                        <th scope="col">VMware Tools Running Status</th>
                        <th scope="col">Host CPU</th>
                        <th scope="col">Host Memory (GB)</th>
                        <th scope="col">Guest Mem - %</th>
                        <th scope="col">DNS Name</th>
                        <th scope="col">EVC Mode</th>
                        <th scope="col">UUID</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Alarm Actions</th>
                        <th scope="col">HA Protected</th>
                        <th scope="col">Need Consolidation</th>
                        <th scope="col">VM Storage Policies Compliance</th>
                        <th scope="col">Encryption</th>
                        <th scope="col">TPM</th>
                        <th scope="col">VBS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(isset($vmguest) && count($vmguest) > 0){
                        foreach($vmguest as $temp){
                            ?>
                            <tr>
                                <th scope="row"><?=$temp['id_vmguest'] ?> </th>
                                <td><?=$temp['name'] ?> </td>
                                <td><?=$temp['state']?></td>
                                <td><?=$temp['managed']?></td>
                                <td><?=$temp['host']?></td>
                                <td><?=$temp['cluster']?></td>
                                <td><?=$temp['provisioned_space']?></td>
                                <td><?=$temp['used_space']?></td>
                                <td><?=$temp['guest_os']?></td>
                                <td><?=$temp['compability']?></td>
                                <td><?=$temp['memory_size']?></td>
                                <td><?=$temp['reservation']?></td>
                                <td><?=$temp['cpu']?></td>
                                <td><?=$temp['nics']?></td>
                                <td><?=$temp['uptime']?></td>
                                <td><?=$temp['ip_address']?></td>
                                <td><?=$temp['vmware_tools_version_status']?></td>
                                <td><?=$temp['vmware_tools_running_status']?></td>
                                <td><?=$temp['host_cpu']?></td>
                                <td><?=$temp['host_memory']?></td>
                                <td><?=$temp['guest_mem']?></td>
                                <td><?=$temp['dns_name']?></td>
                                <td><?=$temp['evc_mode']?></td>
                                <td><?=$temp['uuid']?></td>
                                <td><?=$temp['notes']?></td>
                                <td><?=$temp['alarm_actions']?></td>
                                <td><?=$temp['ha_protected']?></td>
                                <td><?=$temp['need_consolidation']?></td>
                                <td><?=$temp['vm_storage']?></td>
                                <td><?=$temp['encryption']?></td>
                                <td><?=$temp['tpm']?></td>
                                <td><?=$temp['vbs']?></td>
                                
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="5">No record found.</td>
                        </tr>
                        <?php
                            
                }
                    ?>
                </tbody>
            </table>
            
            </div>
        </div>

    </div>
  </div>

</body>
</html>