<?php
  require "config.php";

  // =========================database query============
  if (isset($_GET['cari'])){
    $cari = $_GET['cari'];
  
    $data = mysqli_query($konek,"SELECT * FROM iot_table WHERE DATE(time) = '$cari' ");
  }
  else{
    $data = mysqli_query($konek,"SELECT * FROM iot_table");
  }
  $sensor=[];
  $time = [];

  $rows=[];
	while($row=mysqli_fetch_assoc($data)){
		$rows[]=$row;
  }
  // var_dump($rows);
  // exit;

  $day_arr = [];
  $data_sensor = [];
  $data_time = [];

  foreach($rows as $row){
    $time_data = strtotime($row["time"]);
    $day = date("d", $time_data);
   
    
    if (!in_array($day,$day_arr)){
      if(!empty($day_arr)){
        $max =  max($data_sensor);
        $sensor[] = $max ;
        $time[] = end($data_time);
      }
      $day_arr [] = $day;
      $data_sensor = [];
      
    }
    $data_sensor[] = $row["data_sensor"];
    $data_time[] = date("d-M-Y", $time_data);
  }

  /*
  * Last day
  *
  */

  $container= [];
  $container_time=[];
  foreach($rows as $row){
    $time_data = strtotime($row["time"]);
    $day = date("d-M-Y", $time_data);

    // var_dump(end($data_time));
    // exit();
    if(end($data_time) == $day){
      
      $container[] = $row["data_sensor"];
      $container_time[] = date("d-M-Y", $time_data);
      
    }
  }
  //last day algoritm
  if(!empty($container)){
    $sensor[] = max($container);
    $time[] = end($data_time);
  }

// var_dump($data_time);
// exit();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Avarage | IOT</title>

   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">


  <!-- /#wrapper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
  <!-- Bootstrap core JavaScript -->
 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">
        <img src="image/smartphone.png" alt="" style="width: 170px;">   
        <p class="logo-title">Internet Of Things</p>
      </div>
      <div class="list-group list-group-flush">
        <a href="/iot-web" class="list-group-item list-group-item-action bg-light">
          <i class="far fa-compass"></i> Dashboard
        </a>
        <a href="avarage.php" class="list-group-item list-group-item-action bg-light">
          <i class="fas fa-chart-bar"></i> Avarage RR
        </a>
        <a href="location.php" class="list-group-item list-group-item-action bg-light">
          <i class="fas fa-map-marker-alt"></i>  Location
        </a>
  
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom fixed-top">
        <button class="btn" id="menu-toggle">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </button>

        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        
        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
          
          <ul class="navbar-nav ml-auto ">
            <form class="form-inline my-2 my-lg-0" action="" method="GET" id="search">
              <input class="form-control mr-sm-2" name="cari" type="search" placeholder=" exp 2022-01-08" aria-label="Search">
              <button class="btn btn-outline-success my-2 "  type="submit">Search</button>
            </form>
           
          </ul>
        <!-- </div> --> 
      </nav>

      <div class="container-content">
        <h4 class="mt-2 ">Avarage Sensor Per Day</h4>
        <p class="breadcrumbs">Dashboard / Avarange</p>
        <div class="container shadow mb-4">
          <div class="row">
            <div class="col-md-7">
              <div class="chart">
                <canvas id="chart"></canvas>
              </div>
            </div>
            <div class="col-md-5">
              <div class="chart">
                <canvas  width="200" height="150" id="bar" ></canvas>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });



    // ================chart===========
    var data_line = 
    {
      labels:<?php echo json_encode($time) ?> ,
      datasets: [{
          type: 'line',
          label: 'sensor',
          id: "y-axis-0",
          borderColor: "lightblue",
          data: <?= json_encode($sensor) ?>
      },
      ]
    };
    var options_line = 
    {
          
      // responsive: true,
      // maintainAspectRatio: false,
      title: {
          display: true,
          text:'Value Sensor',
          position: 'left'
      },
      scales: {
          yAxes: [{
              stacked: true,
              position: "left",
              id: "y-axis-0",
          }],
          xAxes: [{
          }],
        }
    };
    var data_bar= 
    {
      labels: ['end data'],
      datasets: [{
        label: 'End Data',
        data:[ <?= json_encode(end($sensor)) ?>],
        backgroundColor: [
          // 'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          // 'rgba(255, 205, 86, 0.2)',
          // 'rgba(75, 192, 192, 0.2)',
          // 'rgba(54, 162, 235, 0.2)',
          // 'rgba(153, 102, 255, 0.2)',
          // 'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          // 'rgb(255, 99, 132)',
          // 'rgb(255, 159, 64)',
          // 'rgb(255, 205, 86)',
          // 'rgb(75, 192, 192)',
          // 'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          // 'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    };

    var options_bar = 
    {
      //   responsive: true,
      // maintainAspectRatio: false,
      title: {
        // display: true,
        // text: 'Value Sensor',
        position: 'left'
      },
      legend: {
        align: 'start',
        position: 'top',
      },
      tooltips: {
        mode: 'label'
      },
        
      scales: {
        yAxes: [{
          stacked: true,
          position: "left",
          id: "y-axis-0",
          }],
        y: {
        // min: 100,
        // max: 200,
      }
      }
    };
    Chart.Line('chart', {
        data: data_line,
        options: options_line,
    });
    Chart.Bar('bar', {
        data: data_bar,
        options: options_bar,
    });
  </script>

</body>

</html>
