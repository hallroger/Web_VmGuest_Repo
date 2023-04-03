<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- bootstrap icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<!-- chart js -->
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
<style>
center_text{
  text-align: center
}

</style>
</head>
<body >
	<!-- navbar for index -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="/favicon.ico" width="30" height="30" alt="">
  <a class="navbar-brand" href="<?=site_url('/')?>">VMGUEST</a>
  
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
        <a class="nav-link" href="<?=site_url('/table_backup_all')?>">Data Backup </a>
      </li>
    </ul>
  </div>
</nav>
	

	
	<?php
	$temp;
	$temp2;
	$temp3;
	$count = count($log);
	if ($count == 0){
      $temp  = 0;
      $temp2 = 0;
      $temp3 = 0;
  }else if ($count != 0){

      $temp = $log[$count-1]['count_on'];
      $temp2 = $log[$count-1]['count_off'];
      $temp3 = $log[$count-1]['time_data'];
  }
  ?>
  <div class = "container-fluid border-top" >
  
  <div class = "row">
  <div class="p-3">
	<h2 >Current Data: <?=$temp3;?></h2>
  </div>
  <div class = 'col-lg-6'>
	<h2>VMGuest Powered On</h2>
	<h2 class = 'bi bi-power' style = 'font-size: 2rem; color: green;'><?=$temp;?></h2>
  <canvas id="chart_on" width="30" height="15"></canvas>
  </div>
  <div class = 'col-lg-6'>
  <h2>VMGuest Powered Off</h2>
	<h2 class = 'bi bi-power' style = 'font-size: 2rem; color: red;'><?= $temp2;?></h2>
  <canvas id="chart_off" width="30" height="15"></canvas>
  </div>
</div>
  </div>
<div class="p-4">
<div class = "container">
  
    <h3 class="center_text">Statistics VM GUEST</h3>
    </div>
  </div>
</div>
</div>

  <div class='container-fluid border'>
    <div class="row">
  
<!-- vmguest chart -->
<div class = 'col-lg-6'>
<canvas id="chart_total" width="30" height="15"></canvas>
</div>
<div class = 'col-lg-6'>
<canvas id="chart_current" width="30" height="15"></canvas>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  var log = <?php echo json_encode($log); ?>;
  
  var count = log.length
  var counter = 0;
  var log_backup = log;
  var tmp_data;
  var arr_current = [];
  var arr_count = [];
  var arr_date = [];
  var arr_on = [];
  var arr_off = [];
  while (counter != count){
    tmp_data= log_backup[counter]['time_data'];
    console.log(tmp_data);
    arr_date.push(tmp_data);
    tmp_data= log_backup[counter]['count_data'];
    arr_count.push(tmp_data);
    tmp_data= log_backup[counter]['count_on'];
    arr_on.push(tmp_data);
    tmp_data= log_backup[counter]['count_off'];
    arr_off.push(tmp_data);
    tmp_data= log_backup[counter]['count_current'];
    arr_current.push(tmp_data);
    
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
    // CHART TOTAL VMGUEST
    new Chart(document.getElementById("chart_current"), {
    type: 'line',
    data: {
        labels: arr_date,
        datasets: [{
			backgroundColor: 'rgba(0,0,0,1)',
			borderColor: 'rgba(0,0,0,1)',
		
			hoverBackgroundColor: 'rgba(8,0,0,1)',
			color: 'rgba(0,0,0,1)',
            label: 'VM Guest Per Hari',
            data: arr_current,
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

	
</body>
</html>