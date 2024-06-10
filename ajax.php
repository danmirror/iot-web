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
            <div class="col-sm-6 margin-left">
              <div class="shadow " >
                  <div class="card-body">
                      <div class=" font-weight-bold text-primary text-uppercase mb-1">
					  	Heart Rate
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= end($data['sensor1'])?> ppm</div>
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
            
    <div>
    <!-- /#page-content-wrapper -->

  </div>

</body>

</html>
