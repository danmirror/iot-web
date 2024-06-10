<?php
  require "function.php";

  // =========================database query============
  $rows;
  $ajax_disable = 0;

  if (isset($_GET['cari'])){
    $rows = query_search($_GET['cari'],'tb_sensor');
    $ajax_disable = 1;
  }
  else{
    $rows = query('tb_sensor');
  }

  $data = show_all($rows);
  // var_dump($data);
  // exit();
  
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="IOT | SquadTech">
  <meta name="author" content="danu andrean">

  <title>Index | IOT</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="asset/bootstrap/css/bootstrap4.5.css">
  <!-- Custom styles for this template -->
  <link href="asset/css/style.css" rel="stylesheet">


  <!-- /#wrapper -->
  <script src="asset/bootstrap/js/bundle26.js"></script>
  <!-- Bootstrap core JavaScript -->
 
  <script src="asset/bootstrap/js/jqueryslim.js"></script>
  <script src="asset/bootstrap/js/popper.js"></script>
  <script src="asset/bootstrap/js/bootstrapmin.js"></script>
    
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
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
          <path fill="currentColor" d="M7,17L10.2,10.2L17,7L13.8,13.8L7,17M12,11.1A0.9,0.9 0 0,0 11.1,12A0.9,0.9 0 0,0 12,12.9A0.9,0.9 0 0,0 12.9,12A0.9,0.9 0 0,0 12,11.1M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z" />
        </svg>
        	Dashboard
        </a>
        <a href="location.php" class="list-group-item list-group-item-action bg-light">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5M12,2A7,7 0 0,1 19,9C19,14.25 12,22 12,22C12,22 5,14.25 5,9A7,7 0 0,1 12,2M12,4A5,5 0 0,0 7,9C7,10 7,12 12,18.71C17,12 17,10 17,9A5,5 0 0,0 12,4Z" />
        </svg>
          	Location
        </a>
  
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom fixed-top">
        <button class="btn" id="menu-toggle">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
        </svg>
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
        <p id="getData"></p>
        <p class="breadcrumbs">Dashboard</p>
        <div id="updatedata">
          <div class="row mb-4" >
            <div class="col-sm-6 margin-left">
              <div class="shadow " >
                  <div class="card-body">
                      <div class=" font-weight-bold text-primary text-uppercase mb-1">
                        Heart Rate
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($data['sensor1'])?> bpm</div>
                  </div>
              </div>
            </div>

            <div class="col-sm-6 mb-2 margin-left">
              <div class="shadow " >
                <div class="card-body">
                    <div class=" align-items-center">
                        <div class=" font-weight-bold text-primary text-uppercase mb-1">
                          Status
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($data['sensor2'])?></div>
                    </div>
                </div>
                </div>
            </div>    
            
          </div>
        </div> 
        
        <div class="shadow mb-4">
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

        <div class="shadow">
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
                  <th scope="col">Heart Rate</th>
                  <th scope="col">Status</th>
                  <th scope="col">time</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $num = 1;
                for( $i = $data['count']>5  ? $data['count']-5 : 0; $i< count($rows); $i++):?>
                 <tr>
                  <th scope="row"><?= $num ?></th>
                  <td><?= $rows[$i]["sensor1"];?></td>
                  <td><?= $rows[$i]["sensor2"];?></td>
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

    let time        = <?= json_encode($data['time'])?>;
    let sensor1     = <?= json_encode($data['sensor1'])?>;
    let sensor2     = <?= json_encode($data['sensor2'])?>;

    let endsensor1  = <?= json_encode(end($data['sensor1'])) ?>;



    lines(sensor1, time, 'sensor1',"Value Sensor 1");
    bars(endsensor1,'bar1');

   

    function loadDoc() {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("updatedata").innerHTML =
        this.responseText;
      }
      xhttp.open("GET", "ajax.php");
      xhttp.send();
    }
    let ajax_disable = <?= json_encode($ajax_disable)?>
    
    console.log(ajax_disable);

    if(ajax_disable == 0){
      setInterval(ajax_chart, 3000);
      setInterval(loadDoc, 1000);
    }
    // get new data every 3 seconds

  </script>

  

</body>

</html>
