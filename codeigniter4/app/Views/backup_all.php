<!DOCTYPE html>
<html>
<head>
	<title>VMGUEST Backup Data</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <!-- CDN DATATABLE -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"> </script>
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
<body>

	<div>
	
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="/favicon.ico" width="30" height="30" alt="">
  <a class="navbar-brand" href="/">VMGUEST</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
	<li class="nav-item active">
        <a class="nav-link" href="<?=site_url('/')?>">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=<?=site_url('/table')?>>Table & Upload</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('/table_backup')?>">Comparasi</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?=site_url('/table_backup_all')?>">Data Backup <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  	</div>
	</nav>

	    	<!-- VM list -->
<div class="padding" >
<h3 class="mb-4">Backup List</h3>


<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table_data");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
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



  $(document).ready( function () {
  $('#table_data').DataTable({
       "scrollY": "1400px",
       "scrollCollapse": true,
       "scrollX": false,
       scroller: {
	       loadingIndicator: true
        },
       defRender: true,             
      });
   $('.dataTables_length').addClass('bs-select');
  } );
   </script>
   <h4>Use Ctrl+F to Find Data</h4>
  <div class = "table-resposive -sm text-wrap table-wrapper-scroll-y my-custom-scrollbar" cellspacing="0"width="100%">
  <table id = 'table_data' class = "table table-bordered table-dark table-sm table-hover">
		<thead >
			<tr>
				<th scope="col">Date Backup</th>
				<th scope="col">Name</th>
				<th scope="col">State</th>
				<th scope="col">Managed</th>
				<th scope="col">Host</th>
				<th scope="col">Cluster</th>
				<th scope="col">Provisioned Space (GB)</th>
				<th scope="col">Used Space (GB)</th>
				<th scope="col">Guest OS</th>
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
						ini_set('Memory Limit','5000M');
						if(isset($backup_all) && count($backup_all) > 0){
							foreach($backup_all as $temp){
								?>
								<tr>
									<td><?=$temp['time_data'] ?> </td>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>