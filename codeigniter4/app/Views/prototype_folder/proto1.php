<!DOCTYPE html>
<head>
    <title>Comparasion Table</title>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
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
      <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script> -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('DataTables/datatables.css')?>"/><!--DataTables/datatables.min.css-->
 
      <script type="text/javascript" src="<?php echo base_url('DataTables/datatables.js')?>"></script>
 

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
        <a class="nav-link" href="<?=site_url('UsersController/index')?>">Home </a>
      <li class="nav-item active">
      <li class="nav-item">
        <a class="nav-link" href=<?=site_url('UsersController/table')?>>Table & Upload</a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('UsersController/table_backup')?>">Comparasi<span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?=site_url('UsersController/table_backup_all')?>">Data Backup </a>
      </li>
    </ul>
  </div>
</nav>
<div class="padding">
<h3 class="mb-4">Compare Table</h3>
<?php echo (base_url('/DataTables/datatables.min.css'))?>

  <script>
            $(document).ready( function () {
              $('#table_data').DataTable({
                  "scrollY": "1100px",
                  "scrollCollapse": true,
                   "scrollX": true,
                   scroller: {
                      loadingIndicator: true
                     },
                    defRender: true,
                    "lengthMenu": [[10, 25, 50], [10, 25, 50]]
                  
                  
            });
            $('.dataTables_length').addClass('bs-select');
            } );
   </script>
  <div class = "table-resposive -sm text-wrap table-wrapper-scroll-y my-custom-scrollbar" cellspacing="0"width="100%">
  <table id = 'table_data' class = "table table-bordered table-dark table-sm table-hover">
    <thead>
      <tr>
      <th scope="col">No</th>
      <th scope="col">Name VM current</th>
      <th scope="col">Name VM previous</th>
      <th scope="col">Status</th>
      <th scope="col">State Previous</th>
      <th scope="col">State Current</th>
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
  $count_users = count($users);
  $count_backup = count($backup);
  $temp_user = 0;
  $temp_backup = 0;
  $delta = 0;
  $count = 0;
  $cnt  = 0;
  $temp_state = 'No Data Avalaible';
  $blank = ' ';
  $no_status = ' ';
  $status  = 'New Data';
  //ini_set('memory_limit','3000M');
  
        if (isset($backup) && count($backup)> 0 && $count_users>$count_backup){
        
          foreach ($backup as $temp){
                if ($users[$count]['name'] == $temp['name']){ ?>
                      <!-- if data exist in vmguest status is Blank -->
                      <tr>
                        <td><?=$temp['id_vmguest_backup'] ?> </td>
                        <?php
                          if ( $users[$count]['name'] == $temp['name']){
                        ?>
                            <td><?=$blank?></td>
                            <td><?=$users[$count]['name']?></td>
                            <?//php echo $users[$count]['name']?>
                          <?php }else if ($users[$count]['name'] != $temp['name']){ ?>
                            
                            <td><?=$temp['name']?></td>
                            <td><?=$users[$count]['name']?></td>
                            <?php } ?>
                        <?php
                          if ( $users[$count]['name'] != $temp['name']){
                        ?>
                            <td><?=$temp['state']?></td>
                            <td><?=$users[$count]['state']?></td>
                            <?//php echo $users[$count]['name']?>
                          <?php }else if ($users[$count]['name'] == $temp['name']){ ?>
                            
                            <td><?=$temp['state']?></td>
                            <td><?=$temp_state?></td>
                            <?php echo $count?>
                            <?php } ?>
                        
                        <td><?=$temp['host']?></td>
                        <td><?=$temp['cluster']?></td>
                        <td><?=$temp['provisioned_space']?></td>
                        <td><?=$temp['used_space']?></td>
                        <td><?=$users[$count]['used_space']?></td>
                        <?php 
                            //  if ($temp['name'] == $backup[$count]['name']){
                               $temp_backup = $konversi->convert_to_int($temp['used_space']);
                               $temp_user = $konversi->convert_to_int($users[$count]['used_space']);
                               if (($delta = $temp_user - $temp_backup) == true){
                                $cnt = $cnt+1;
                                
                                }
                            //  }else{
                            //    $delta = 0;
                            //  }
                        ?>
                        <td><?=$delta?></td>
                      </tr>
                      <?php
                      $count++;
                    } else if ($users[$count]['name'] != $temp['name']){ ?>
                      <!-- if data is not exist in vmguest backup-->
                      <tr>
                        <td><?=$temp['id_vmguest_backup'] ?> </td>
                        <td><?=$users[$count]['name']?></td>
                        <td><?=$status?></td>


                        <?php
                          if ( $users[$count]['name'] != $temp['name']){
                        ?>
                            <td><?=$temp['state']?></td>
                            <td><?=$users[$count]['state']?></td>
                            <?//php echo $users[$count]['name']?>
                          <?php }else if ($users[$count]['name'] == $temp['name']){ ?>
                            
                            <td><?=$temp['state']?></td>
                            <td><?=$temp_state?></td>
                            <?php echo $count?>
                            <?php } ?>
                        
                        <td><?=$temp['host']?></td>
                        <td><?=$temp['cluster']?></td>
                        <td><?=$temp['provisioned_space']?></td>
                        <td><?=$temp['used_space']?></td>
                        <td><?=$users[$count]['used_space']?></td>
                        <?php 
                            //  if ($temp['name'] == $backup[$count]['name']){
                               $temp_backup = $konversi->convert_to_int($temp['used_space']);
                               $temp_user = $konversi->convert_to_int($users[$count]['used_space']);
                               if (($delta = $temp_user - $temp_backup) == true){
                                $cnt = $cnt+1;
                                
                                }
                            //  }else{
                            //    $delta = 0;
                            //  }
                        ?>
                        <td><?=$delta?></td>
                      </tr>
                      <?php
                      $count++;
              }         
          }
        } else if (isset($backup) && count($backup)> 0 && $count_backup>$count_users){ //backup as counter
          foreach ($users as $temp){
            if (isset($users)){ 
          ?>
          <tr>
            <td><?=$temp['id_vmguest'] ?> </td>
            <td><?=$temp['name'] ?> </td>
            <td><?=$backup[$count]['name'] ?> </td>

            <?php
              if ($backup[$count]['name'] == $temp['name']){
            ?>
                <td><?=$backup[$count]['state']?></td>
                <td><?=$temp['state']?></td>
            <?php }else if ($backup[$count]['name'] != $temp['name']){ ?>
              
              <td><?=$backup[$count]['state']?></td>
              <td><?=$temp_state?></td>

              <?php }?>
            
            <td><?=$temp['host']?></td>
            <td><?=$temp['cluster']?></td>
            <td><?=$temp['provisioned_space']?></td>
            <td><?=$backup[$count]['used_space']?></td>
            <td><?=$temp['used_space']?></td>
            <?php 
                //  if ($temp['name'] == $backup[$count]['name']){
                    $temp_backup = $konversi->convert_to_int($backup[$count]['used_space']);
                    $temp_user = $konversi->convert_to_int($temp['used_space']);
                    
                    if (($delta =  $temp_user - $temp_backup) == true){
                      $cnt = $cnt+1;
                    
                    }
                //  }else{
                //    $delta = 0;
                //  }
            ?>
            <td><?=$delta?></td>
          </tr>
          <?php
            }
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
  <h1>Data Different : <?= $cnt; ?> Data</h1>
</div>
</div>
</body>
</html>