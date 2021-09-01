<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('style.css') ?>" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- morris js -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->
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
<style>
.solid_border {border-style: solid;}
.padding{padding: 24px;}

</style>
</head>
<body >
	<!-- navbar for index -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?=base_url('UsersController/index')?>">VMGUEST</a>
  
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="<?=base_url('UsersController/index')?>">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=<?=base_url('UsersController/table')?>>Table & Upload</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('UsersController/table_backup')?>">Comparasi</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?=base_url('UsersController/table_backup_all')?>">Data Backup </a>
      </li>
    </ul>
  </div>
</nav>
	

	<div class="container">
	
	<?php
	$temp;
	$temp2;
	$temp3;
	$count = count($log);
	
	$temp = $log[$count-1]['count_on'];
	$temp2 = $log[$count-1]['count_off'];
	$temp3 = $log[$count-1]['time_data'];
	?>
  <div class="padding">
  <div class = "container solid_border " >
	<h3>Current Data: <?=$temp3;?></h3>
	<h2>VMGuest Powered On</h2>
	<h1 class="bi bi-power" style="font-size: 3rem; color: green;"><?=$temp;?></h1>
	<h2>VMGuest Powered Off</h2>
	<h1 class="bi bi-power" style="font-size: 3rem; color: red;"><?= $temp2;?></h1>
  </div>
  </div>


	<h3>Statistics VM GUEST</h3>
	

<canvas id="chart_on" width="7" height="3"></canvas>
<div></div>
<canvas id="chart_off" width="7" height="3"></canvas>
<canvas id="chart_total" width="7" height="3"></canvas>
<canvas id="chart_current" width="7" height="3"></canvas>

<script type="text/javascript">
  var log = <?php echo json_encode($log); ?>;
  
  var count = log.length
  var counter = 0;
  var log_backup = log;
  var tmp_data;
  var arr_count_current = [];
  var arr_count = [];
  var arr_date = [];
  var arr_on = [];
  var arr_off = [];
  while (counter != count){
    tmp_data= log_backup[counter]['time_data'];
    arr_date.push(tmp_data);
    tmp_data= log_backup[counter]['count_current'];
    arr_count_current.push(tmp_data);
    tmp_data= log_backup[counter]['count_data'];
    arr_count.push(tmp_data);
    tmp_data= log_backup[counter]['count_on'];
    arr_on.push(tmp_data);
    tmp_data= log_backup[counter]['count_off'];
    arr_off.push(tmp_data);
    
    counter = counter+1;

  };
  // CHART VMGUEST ON
  new Chart(document.getElementById("chart_on"), {
    type: 'line',
    data: {
        labels: arr_date,
        datasets: [{
			backgroundColor: 'rgba(0,255,24,1)',
			borderColor: 'rgba(0,255,24,1)',
			
			hoverBackgroundColor: 'rgba(0,255,24,1)',
			color: 'rgba(0,255,24,1)',
            label: 'VM Guest ON',
            data: arr_on,
            borderWidth: 1
        }]
       
        
    },
    options: {
      legend: { display: false },
	  layout: {
		  padding:10
	  },
      title: {
        display: true,
        text: 'VM GUEST STATE'
      }
    }
    });
    // CHART VMGUEST OFF
    new Chart(document.getElementById("chart_off"), {
    type: 'line',
    data: {
        labels: arr_date,
        datasets: [{
			backgroundColor: 'rgba(255,0,0,1)',
			borderColor: 'rgba(255,0,0,1)',
			
			hoverBackgroundColor: 'rgba(255,0,0,1)',
			color: 'rgba(255,0,0,1)',
            label: 'VM Guest OFF',
            data: arr_off,
            borderWidth: 1
        }]
       
        
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'VM GUEST STATE'
      }
    } 
    });
    // CHART TOTAL VMGUEST
    new Chart(document.getElementById("chart_total"), {
    type: 'line',
    data: {
        labels: arr_date,
        datasets: [{
			backgroundColor: 'rgba(0,0,0,1)',
			borderColor: 'rgba(0,0,0,1)',
		
			hoverBackgroundColor: 'rgba(8,0,0,1)',
			color: 'rgba(0,0,0,1)',
            label: 'Jumlah VM Guest',
            data: arr_count,
            borderWidth: 1
        }]
       
        
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'VM GUEST'
      }
    }
    });
    new Chart(document.getElementById("chart_current"), {
    type: 'line',
    data: {
        labels: arr_date,
        datasets: [{
			backgroundColor: 'rgba(0,0,0,1)',
			borderColor: 'rgba(0,0,0,1)',
		
			hoverBackgroundColor: 'rgba(8,0,0,1)',
			color: 'rgba(0,0,0,1)',
            label: 'Jumlah VM Guest',
            data: arr_count_current,
            borderWidth: 1
        }]
       
        
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'VM GUEST'
      }
    }
    });
</script>

	
	</div>
</body>
</html>