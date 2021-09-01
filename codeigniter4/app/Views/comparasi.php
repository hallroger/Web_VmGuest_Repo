<!DOCTYPE html>
<head>
    <title>Comparasion Table</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script> -->
    <!-- Bootstrap core JavaScript -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
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
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">VMGUEST</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <a class="nav-link" href="<?=base_url('UsersController/index')?>">Home </a>
      <li class="nav-item active">
      <li class="nav-item">
        <a class="nav-link" href=<?=base_url('UsersController/table')?>>Table & Upload</a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('UsersController/table_backup')?>">Comparasi<span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?=base_url('UsersController/table_backup_all')?>">Data Backup </a>
      </li>
    </ul>
  </div>
</nav>
<div class="padding">
<h3 class="mb-4">VM Guest Growth Storage</h3>
<?php
  $temp3;
  $count = count($log);
  $temp2;
  $temp3 = $log[$count-1]['time_data'];
  $temp2 = $log[$count-2]['time_data'];
  ?>
              
  <h3 >Current Data: <?=$temp3;?></h3>
  <h3 >Previous Data: <?=$temp2;?></h3>

  <script>
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
  <div class = "table-resposive -sm text-wrap table-wrapper-scroll-y my-custom-scrollbar" cellspacing="0"width="100%">
  <table id = 'table_data' class = "table table-bordered table-dark table-sm table-hover">
    <thead>
      <tr>
      <th scope="col">No</th>
      <th scope="col">Name VM</th>
      <th scope="col">State Previous</th>
      <th scope="col">State After</th>
      <th scope="col">Host</th>
      <th scope="col">Cluster</th>
      <th scope="col">Provisioned Space</th>
      <th scope="col">Used Space Before (GB)</th>
      <th scope="col">Used Space Current (GB)</th>
      <th scope="col">Delta Space (GB)</th>
      </tr>
    </thead>
    <tbody>
<?php 
use App\Libraries\Konversi;
  $konversi = new Konversi();
  $temp_user = 0;
  $temp_backup = 0;
  $delta = 0;
  $count = 0;
  //ini_set('memory_limit','3000M');
  if (isset($backup) && count($backup)> 0){
    
      
      foreach ($backup as $temp){
        
    ?>
    <tr>
      <td><?=$temp['id_vmguest_backup'] ?> </td>
      <td><?=$temp['name'] ?> </td>
      <td><?=$temp['state']?></td>
      <td><?=$users[$count]['state']?></td>
      <td><?=$temp['host']?></td>
      <td><?=$temp['cluster']?></td>
      <td><?=$temp['provisioned_space']?></td>
      <td><?=$temp['used_space']?></td>
      <td><?=$users[$count]['used_space']?></td>
      <?php 
           //menghitung selisih used space
              $temp_user = $konversi->convert_to_int($users[$count]['used_space']);
              $temp_backup = $konversi->convert_to_int($temp['used_space']);
              
              $delta = $temp_user - $temp_backup;
              
      ?>
      <td><?=$delta?></td>
    </tr>
    <?php
    $count++;
      }
  } else {
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
</body>
</html>