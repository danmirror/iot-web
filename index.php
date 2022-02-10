<?php
  require "config.php";

  // =========================database query============
  if (isset($_GET['cari'])){
    $cari = $_GET['cari'];

    $data = mysqli_query($konek,"SELECT * FROM tb_sensor WHERE time like '%".$cari."%' ");
  }
  else{
    $data = mysqli_query($konek,"SELECT * FROM tb_sensor");
  }
  $suhu1=[];
  $suhu2=[];
  $kelembaban1=[];
  $kelembaban2=[];
  $gas=[];
  
  $time = [];
  $count=0;
  $rows=[];
	while($row=mysqli_fetch_assoc($data)){
		$rows[]=$row;
  }
  // var_dump($rows);
  // exit;
  foreach($rows as $row){
    $time_data = strtotime($row["time"]);
    $suhu1[] = $row["suhu1"];
    $suhu2[] = $row["suhu2"];
    $kelembaban1[] = $row["kelembaban1"];
    $kelembaban2[] = $row["kelembaban2"];
    $gas[] = $row["gas"];

    // $time[] = date("H:i d-M-Y", $time_data);
    // $time[] = date("H:i d-M-Y", $time_data+1*60*60);
    $time[] = date("H:i d-M-Y", $time_data);
    $count +=1;
    // var_dump($time);
  }
//  var_dump($kelembaban1);
//   exit;

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Index | IOT</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="asset/css/style.css" rel="stylesheet">


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
        <img src="asset/image/smartphone.png" alt="" style="width: 170px;">   
        <p class="logo-title">Internet Of Things</p>
      </div>
      <div class="list-group list-group-flush">
        <a href="/iot-web" class="list-group-item list-group-item-action bg-light">
          <i class="far fa-compass"></i> Dashboard
        </a>
        <a href="avarage.php" class="list-group-item list-group-item-action bg-light">
          <i class="fas fa-chart-bar"></i> Avarage 
        </a>
        <a href="control.php" class="list-group-item list-group-item-action bg-light">
          <i class="fas fa-chart-bar"></i> Control
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
            <form class="form-inline my-lg-0" action="" method="GET" id="search">
              <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Cari dengan waktu" aria-label="Search">
              <button class="btn btn-outline-success my-2"  type="submit">Search</button>
            </form>
           
          </ul>
        <!-- </div> --> 
      </nav>

      <div class="container-content">
        <h4 class="mt-2 ">RealTime Sensor</h4>
        <p class="breadcrumbs">Dashboard</p>
        <div class="container shadow mb-4">
          <div class="row">
            <div class="col-md-7">
              <div class="chart">
                <canvas id="sensor1"></canvas>
              </div>
            </div>
            <div class="col-md-5">
              <div class="chart">
                <canvas  width="200" height="150" id="bar1" ></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="container shadow mb-4">
          <div class="row">
            <div class="col-md-7">
              <div class="chart">
                <canvas id="sensor2"></canvas>
              </div>
            </div>
            <div class="col-md-5">
              <div class="chart">
                <canvas  width="200" height="150" id="bar2" ></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="container shadow mb-4">
          <div class="row">
            <div class="col-md-7">
              <div class="chart">
                <canvas id="sensor3"></canvas>
              </div>
            </div>
            <div class="col-md-5">
              <div class="chart">
                <canvas  width="200" height="150" id="bar3" ></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="container shadow">
          <div class="row">
            <div class="col-md-3">
              <div class="container-content">
                <p class="note">Tabel deskripsi menampilkan data dengan nilai 5 data terakhir dari sensor </p>
                
              </div>
            </div>
            <div class="col-md-9">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">suhu1</th>
                  <th scope="col">suhu2</th>
                  <th scope="col">kelembaban1</th>
                  <th scope="col">kelembaban1</th>
                  <th scope="col">gas</th>
                  <th scope="col">time</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $num = 1;
                for( $i = $count>5  ? $count-5 : 0; $i< count($rows); $i++):?>
                 <tr>
                  <th scope="row"><?= $num ?></th>
                  <td><?= $rows[$i]["suhu1"];?></td>
                  <td><?= $rows[$i]["suhu2"];?></td>
                  <td><?= $rows[$i]["kelembaban1"];?></td>
                  <td><?= $rows[$i]["kelembaban2"];?></td>
                  <td><?= $rows[$i]["gas"];?></td>
                  <td><?= $rows[$i]["time"];?></td>
                </tr>
                <?php
                $num++;
                endfor ?>
               
              </tbody>
            </table>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <script src="asset/js/chart.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    let time = <?php echo json_encode($time)?>;
    let suhu1 = <?php echo json_encode($suhu1)?>;
    let suhu2 = <?php echo json_encode($suhu2)?>;

    let endsuhu1 =  <?= json_encode(end($suhu1)) ?>;
    let endsuhu2 =  <?= json_encode(end($suhu2)) ?>;

    let kelembaban1 = <?php echo json_encode($kelembaban1)?>;
    let kelembaban2 = <?php echo json_encode($kelembaban2)?>;
    
    let endkelembaban1 =  <?= json_encode(end($kelembaban1)) ?>;
    let endkelembaban2 =  <?= json_encode(end($kelembaban2)) ?>;
    
    let gas = <?php echo json_encode($gas)?>;
    let endgas =  <?= json_encode(end($gas)) ?>;

    double_lines(suhu1,kelembaban1, time, 'sensor1',"Value Sensor 1");
    double_bars(endsuhu1,endkelembaban1,'bar1');
    
    double_lines(suhu2,kelembaban2, time, 'sensor2',"Value Sensor 2");
    double_bars(endsuhu2,endkelembaban2,'bar2');

    lines(gas, time, 'sensor3',"Value Sensor 3");
    bars(endgas,'bar3');

  </script>

  

</body>

</html>
