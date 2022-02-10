<?php
  require "config.php";
  require "function.php";

  // =========================database query============
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    // echo $_POST['value1'];
    $btn1 = $_POST['value1'];
    $btn2 = $_POST['value2'];
    $btn3 = $_POST['value3'];
    $btn4 = $_POST['value4'];

    update($konek,$btn1,$btn2,$btn3,$btn4);

    // var_dump($_POST['value1']);
    // exit();
  }

  if (isset($_GET['cari'])){
    $cari = $_GET['cari'];

    $data = mysqli_query($konek,"SELECT * FROM respon WHERE time like '%".$cari."%' ");
  }
  else{
    $data = mysqli_query($konek,"SELECT * FROM respon");
  }
  $value1;
  $value2;
  $value3;
  $value4;
  
  $rows=[];
	while($row=mysqli_fetch_assoc($data)){
		$rows[]=$row;
  }
  // exit;
  foreach($rows as $row){
      $value1 = $row["value1"];
      $value2 = $row["value2"];
      $value3 = $row["value3"];
      $value4 = $row["value4"];
    }
    // var_dump($value2);
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
          
          <!-- <ul class="navbar-nav ml-auto ">
            <form class="form-inline my-2 my-lg-0" action="" method="GET" id="search">
              <input class="form-control mr-sm-2" name="cari" type="search" placeholder=" exp 2022-01-08" aria-label="Search">
              <button class="btn btn-outline-success my-2 "  type="submit">Search</button>
            </form>
           
          </ul> -->
        <!-- </div> --> 
      </nav>

      <div class="container-content">
        <h4 class="mt-2 ">Setting Response</h4>
        <p class="breadcrumbs">Dashboard / Control</p>
        <div class="container shadow mb-5">

            <div class="container py-5">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md">
                                        <label >Pressure</label>
                                    </div>
                                    <div class="col-md mb-2">
                                        <div class="input-group ">
                                            <input type="hidden"  type="text" class="form-control" name="value1" value="<?php $value1?>" id="value1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 ">
                                    <span class="btn btn-outline-success " onclick="pressure_on();" id="press_id_on">ON</span>
                                    </div>
                                    <div class="col-sm-6">
                                    <span class="btn btn-outline-danger " onclick="pressure_off();" id="press_id_off">off</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md">
                                        <label >Volume</label>
                                    </div>
                                    <div class="col-md mb-2">
                                        <div class="input-group ">
                                            <input type="hidden"  type="text" class="form-control" name="value2" value="<?php $value2 ?>" id="value2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 ">
                                    <span class="btn btn-outline-success " onclick="volume_on();" id="volume_id_on">ON</span>
                                    </div>
                                    <div class="col-sm-6">
                                    <span class="btn btn-outline-danger " onclick="volume_off();" id="volume_id_off">off</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md">
                                        <label >Boiler</label>
                                    </div>
                                    <div class="col-md mb-2">
                                        <div class="input-group ">
                                            <input type="hidden"  type="text" class="form-control" name="value3" value="<?php $value3?>" id="value3">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 ">
                                    <span class="btn btn-outline-success " onclick="boiler_on();" id="boiler_id_on">ON</span>
                                    </div>
                                    <div class="col-sm-6">
                                    <span class="btn btn-outline-danger " onclick="boiler_off();" id="boiler_id_off">off</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md">
                                        <label >cond</label>
                                    </div>
                                    <div class="col-md mb-2">
                                        <div class="input-group ">
                                            <input type="hidden"  type="text" class="form-control" name="value4" value="<?php $value4?>" id="value4">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 ">
                                    <span class="btn btn-outline-success " onclick="condensor_on();" id="condensor_id_on">ON</span>
                                    </div>
                                    <div class="col-sm-6">
                                    <span class="btn btn-outline-danger " onclick="condensor_off();" id="condensor_id_off">off</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            control ini menyebabkan sensor off dan sistem monitoring akan berhenti,
                            tetap control?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                        </div>
                    </div>
                    </div>


                    <div class="d-flex justify-content-sm-end ">
                        <button  class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#exampleModal">Set</button>
                    </div>                               
                </form>
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
        var btn1 = <?php echo $value1?>;
        var btn2 = <?php echo $value2?>;
        var btn3 = <?php echo $value3?>;
        var btn4 = <?php echo $value4?>;
        // console.log("DDD",btn1)
        if(btn1)
            pressure_on();
        else
            pressure_off();
        if(btn2)
            volume_on();
        else
            volume_off();
        if(btn3)
            boiler_on();
        else
            boiler_off();
        if(btn4)
            condensor_on();
        else
            condensor_off();
        
        function pressure_on(){
            let count_press =1;
            // console.log(count_press);
            let element_on = document.getElementById("press_id_on");
            let element_off= document.getElementById("press_id_off");
            element_on.classList.remove("btn-outline-success");
            element_on.classList.add("btn-success");
            element_off.classList.remove("btn-danger");
            element_off.classList.add("btn-outline-danger");
            document.getElementById('value1').value=count_press; 
        }
        function pressure_off(){
            let count_press =0;
            // console.log(count_press);
            let element_on = document.getElementById("press_id_on");
            let element_off = document.getElementById("press_id_off");
            element_off.classList.remove("btn-outline-danger");
            element_off.classList.add("btn-danger");
            element_on.classList.remove("btn-success");
            element_on.classList.add("btn-outline-success");
            document.getElementById('value1').value=count_press; 
        }
        function volume_on(){
            let count_volume =1;
            // console.log(count_volume);
            let element_on = document.getElementById("volume_id_on");
            let element_off= document.getElementById("volume_id_off");
            element_on.classList.remove("btn-outline-success");
            element_on.classList.add("btn-success");
            element_off.classList.remove("btn-danger");
            element_off.classList.add("btn-outline-danger");
            document.getElementById('value2').value=count_volume; 
        }
        function volume_off(){
            let count_volume =0;
            // console.log(count_volume);
            let element_on = document.getElementById("volume_id_on");
            let element_off = document.getElementById("volume_id_off");
            element_off.classList.remove("btn-outline-danger");
            element_off.classList.add("btn-danger");
            element_on.classList.remove("btn-success");
            element_on.classList.add("btn-outline-success");
            document.getElementById('value2').value=count_volume; 
        }
        function boiler_on(){
            let count_boiler =1;
            // console.log(count_boiler);
            let element_on = document.getElementById("boiler_id_on");
            let element_off= document.getElementById("boiler_id_off");
            element_on.classList.remove("btn-outline-success");
            element_on.classList.add("btn-success");
            element_off.classList.remove("btn-danger");
            element_off.classList.add("btn-outline-danger");
            document.getElementById('value3').value=count_boiler; 
        }
        function boiler_off(){
            let count_boiler =0;
            // console.log(count_boiler);
            let element_on = document.getElementById("boiler_id_on");
            let element_off = document.getElementById("boiler_id_off");
            element_off.classList.remove("btn-outline-danger");
            element_off.classList.add("btn-danger");
            element_on.classList.remove("btn-success");
            element_on.classList.add("btn-outline-success");
            document.getElementById('value3').value=count_boiler; 
        }
        function condensor_on(){
            let count_condensor =1;
            // console.log(count_condensor);
            let element_on = document.getElementById("condensor_id_on");
            let element_off= document.getElementById("condensor_id_off");
            element_on.classList.remove("btn-outline-success");
            element_on.classList.add("btn-success");
            element_off.classList.remove("btn-danger");
            element_off.classList.add("btn-outline-danger");
            document.getElementById('value4').value=count_condensor; 
        }
        function condensor_off(){
            let count_condensor =0;
            // console.log(count_condensor);
            let element_on = document.getElementById("condensor_id_on");
            let element_off = document.getElementById("condensor_id_off");
            element_off.classList.remove("btn-outline-danger");
            element_off.classList.add("btn-danger");
            element_on.classList.remove("btn-success");
            element_on.classList.add("btn-outline-success");
            document.getElementById('value4').value=count_condensor; 
        }
  </script>

</body>

</html>
