<!DOCTYPE html>
<html>
<head>
	<title>Vmguest Import Data</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css')?>" type="text/css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
        * {
        box-sizing: border-box;
        }

        #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
        }
        </style>
</head>
<body class=".body">
		<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="table">Table & Upload</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="table_backup">Comparasi</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="table_backup_all">Data Backup </a>
      </li>
    </ul>
  </div>
</nav>

<?php
$log = array();
$count_on = 0;
$count_off = 0;
//dd($data);
// $log = $data['log'];
//  if (isset($log)){
// 	$count_on = $log['count_on'];
// 	$count_off = $log['count_off'];
//  };
// //cari tahu $data dipindah kemana
 ?>
<!-- <a><?= $count_off; ?> </a> -->




	<div class="container">
	
	    <div class="row">
	      	<div class="col-md-12">
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

	    <div class="row">

	    	<!-- VM list -->
			<i class="fas fa-shopping-bag    "></i>
			<div class="col-md-12 mt-4" >
				
				<h3 class="mb-4">Users List</h3>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search VM Name Only" title="Type in a name">
				<table id="myTable" class = "table table-bordered table-hovered table-striped">
					
					<thead >
						<tr>
							<th>Name</th>
							<th>State</th>
							<th>Managed</th>
							<th>Host</th>
							<th>Cluster</th>
							<th>Provisioned Space (GB)</th>
							<th>Used Space (GB)</th>
							<th>Guest OS</th>
							<th>Compatibility</th>
							<th>Memory Size (GB)</th>
							<th>Reservation</th>
							<th>CPUs</th>
							<th>NICs</th>
							<th>Uptime (Days)</th>
							<th>IP Address</th>
							<th>VMware Tools Version Status</th>
							<th>VMware Tools Running Status</th>
							<th>Host CPU</th>
							<th>Host Memory (GB)</th>
							<th>Guest Mem - %</th>
							<th>DNS Name</th>
							<th>EVC Mode</th>
							<th>UUID</th>
							<th>Notes</th>
							<th>Alarm Actions</th>
							<th>HA Protected</th>
							<th>Need Consolidation</th>
							<th>VM Storage Policies Compliance</th>
							<th>Encryption</th>
							<th>TPM</th>
							<th>VBS</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(isset($users) && count($users) > 0){
							foreach($users as $temp){
								?>
								<tr>
									
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
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js')?>"><</script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- CDN jQuery Datatable -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</body>
</html>
<script>
                function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    }       
                }
                }
</script>