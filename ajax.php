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
  $sensor1 =[];
  $sensor2 =[];
  $sensor3 =[];
  $sensor4 =[];
  $sensor5 =[];
  
  $time   =[];
  $count  =0;
  $rows   =[];
	while($row=mysqli_fetch_assoc($data)){
		$rows[]=$row;
  }
  // var_dump($rows);
  // exit;
  foreach($rows as $row){
    $time_data = strtotime($row["time"]);
    $sensor1[] = $row["sensor1"];
    $sensor2[] = $row["sensor2"];
    $sensor3[] = $row["sensor3"];
    $sensor4[] = $row["sensor4"];
    $sensor5[] = $row["sensor5"];

    // $time[] = date("H:i d-M-Y", $time_data);
    // $time[] = date("H:i d-M-Y", $time_data+1*60*60);
    $time[] = date("H:i d-M-Y", $time_data);
    $count +=1;
    // var_dump($time);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
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

 
      <div >

      <div class="row mb-4" >
            <div class="col-sm-2 margin-left">
              <div class="card border-left-fiveth shadow " >
                  <div class="card-body">
                      <div class=" font-weight-bold text-primary text-uppercase mb-1">
                         Gas
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($sensor5)?> ppm</div>
                  </div>
              </div>
            </div>

            <div class="col-sm-2 mb-2 margin-left">
              <div class="card border-left-one shadow " >
                <div class="card-body">
                    <div class=" align-items-center">
                        <div class=" font-weight-bold text-primary text-uppercase mb-1">
                            Suhu1
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($sensor1)?> ℃</div>
                    </div>
                </div>
                </div>
            </div>    
            <div class="col-sm-2 mb-2 margin-left">
                <div class="card border-left-second shadow "  >
                <div class="card-body">
                    <div class=" font-weight-bold text-primary text-uppercase mb-1">
                         Suhu2
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($sensor2)?> ℃</div>
                    </div>
                </div>
            </div> 
            <div class="col-sm-3  mb-2 margin-left">
                <div class="card border-left-third shadow ">
                    <div class="card-body">
                        <div class=" font-weight-bold text-primary text-uppercase mb-1">
                          Kelembaban1
                        </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($sensor3)?> RH</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 margin-left">
                <div class="card border-left-fourth shadow "  >
                    <div class="card-body">
                        <div class=" font-weight-bold text-primary text-uppercase mb-1">
                          Kelembaban2
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($sensor4)?> RH</div>
                    </div>
                </div>
            </div>
          </div>
            
    <div>
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
