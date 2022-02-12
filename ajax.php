<?php
  require "function.php";

  // =========================database query============
  $rows;
  if (isset($_GET['cari'])){
    $rows = query_search($_GET['cari'],'tb_sensor');
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($data['sensor5'])?> ppm</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($data['sensor1'])?> ℃</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($data['sensor2'])?> ℃</div>
                    </div>
                </div>
            </div> 
            <div class="col-sm-3  mb-2 margin-left">
                <div class="card border-left-third shadow ">
                    <div class="card-body">
                        <div class=" font-weight-bold text-primary text-uppercase mb-1">
                          Kelembaban1
                        </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($data['sensor3'])?> RH</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 margin-left">
                <div class="card border-left-fourth shadow "  >
                    <div class="card-body">
                        <div class=" font-weight-bold text-primary text-uppercase mb-1">
                          Kelembaban2
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($data['sensor4'])?> RH</div>
                    </div>
                </div>
            </div>
          </div>
            
    <div>
    <!-- /#page-content-wrapper -->

  </div>

</body>

</html>
