<?php
	session_start();
	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy(); 
	
  require "function.php";

  // =========================database query============
	$status =2; //tidak ada kondisi
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    // echo $_POST['value1'];
    $btn1 = $_POST['value1'];
    $btn2 = $_POST['value2'];
    $btn3 = $_POST['value3'];
    $btn4 = $_POST['value4'];

    $status = update($btn1,$btn2,$btn3,$btn4);

  }

  $rows;
  if (isset($_GET['cari'])){
    $rows = query_search($_GET['cari'],'respon');
  }
  else{
    $rows = query('respon');
  }

  // exit;
  foreach($rows as $row){
		$value1 = $row["value1"];
		$value2 = $row["value2"];
		$value3 = $row["value3"];
		$value4 = $row["value4"];
	}
    // var_dump($_SESSION["status"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="IOT | SquadTech">
  <meta name="author" content="danu andrean">

  <title>Control | IOT</title>

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
        <a href="avarage.php" class="list-group-item list-group-item-action bg-light">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M16,11.78L20.24,4.45L21.97,5.45L16.74,14.5L10.23,10.75L5.46,19H22V21H2V3H4V17.54L9.5,8L16,11.78Z" />
        </svg>
         Avarage 
        </a>
        <a href="control.php" class="list-group-item list-group-item-action bg-light">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M11.7 20H11.3L10.9 17.4C9.7 17.2 8.7 16.5 7.9 15.6L5.5 16.6L4.7 15.3L6.8 13.7C6.4 12.5 6.4 11.3 6.8 10.1L4.7 8.7L5.5 7.4L7.9 8.4C8.7 7.5 9.7 6.9 10.9 6.6L11.2 4H12.7L13.1 6.6C14.3 6.8 15.4 7.5 16.1 8.4L18.5 7.4L19.3 8.7L17.2 10.2C17.4 10.8 17.5 11.4 17.5 12H18C18.5 12 19 12.1 19.5 12.2V12L19.4 11L21.5 9.4C21.7 9.2 21.7 9 21.6 8.8L19.6 5.3C19.5 5 19.3 5 19 5L16.5 6C16 5.6 15.4 5.3 14.8 5L14.4 2.3C14.5 2.2 14.2 2 14 2H10C9.8 2 9.5 2.2 9.5 2.4L9.1 5.1C8.5 5.3 8 5.7 7.4 6L5 5C4.7 5 4.5 5 4.3 5.3L2.3 8.8C2.2 9 2.3 9.2 2.5 9.4L4.6 11L4.5 12L4.6 13L2.5 14.7C2.3 14.9 2.3 15.1 2.4 15.3L4.4 18.8C4.5 19 4.7 19 5 19L7.5 18C8 18.4 8.6 18.7 9.2 19L9.6 21.7C9.6 21.9 9.8 22.1 10.1 22.1H12.6C12.1 21.4 11.9 20.7 11.7 20M16 12.3V12C16 9.8 14.2 8 12 8S8 9.8 8 12C8 14.2 9.8 16 12 16C12.7 14.3 14.2 12.9 16 12.3M10 12C10 10.9 10.9 10 12 10S14 10.9 14 12 13.1 14 12 14 10 13.1 10 12M18 14.5V13L15.8 15.2L18 17.4V16C19.4 16 20.5 17.1 20.5 18.5C20.5 18.9 20.4 19.3 20.2 19.6L21.3 20.7C22.5 18.9 22 16.4 20.2 15.2C19.6 14.7 18.8 14.5 18 14.5M18 21C16.6 21 15.5 19.9 15.5 18.5C15.5 18.1 15.6 17.7 15.8 17.4L14.7 16.3C13.5 18.1 14 20.6 15.8 21.8C16.5 22.2 17.2 22.5 18 22.5V24L20.2 21.8L18 19.5V21Z" />
        </svg> 
        Control
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

      </nav>
      

      <div class="container-content">
        <h4 class="mt-2 ">Setting Response</h4>
        <p class="breadcrumbs">Dashboard / Control</p>
        <div class="container shadow mb-5">
					<?php if($_SESSION["status"] == "succes"):?>
						<div class="alert alert-success" role="alert">
							Controlling success!
						</div>
					<?php elseif($_SESSION["status"] == "failed"):?>
						<div class="alert alert-danger" role="alert">
							Controlling failed, make sure everything is set!
						</div>
					
					<?php endif ?>
					
							<div class="container py-5">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md">
                                        <label >Saklar 1</label>
                                    </div>
                                    <div class="col-md mb-2">
                                        <div class="input-group ">
                                            <input type="hidden"  type="text" class="form-control" name="value1" value="<?php $value1?>" id="value1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 ">
                                    <span class="btn btn-outline-success " onclick="func_btn1_on();" id="btn1_id_on">ON</span>
                                    </div>
                                    <div class="col-sm-6">
                                    <span class="btn btn-outline-danger " onclick="func_btn1_off();" id="btn1_id_off">off</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md">
                                        <label >Saklar 2</label>
                                    </div>
                                    <div class="col-md mb-2">
                                        <div class="input-group ">
                                            <input type="hidden"  type="text" class="form-control" name="value2" value="<?php $value2 ?>" id="value2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 ">
                                    <span class="btn btn-outline-success " onclick="func_btn2_on();" id="btn2_id_on">ON</span>
                                    </div>
                                    <div class="col-sm-6">
                                    <span class="btn btn-outline-danger " onclick="func_btn2_off();" id="btn2_id_off">off</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md">
                                        <label >Saklar 3</label>
                                    </div>
                                    <div class="col-md mb-2">
                                        <div class="input-group ">
                                            <input type="hidden"  type="text" class="form-control" name="value3" value="<?php $value3?>" id="value3">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 ">
                                    <span class="btn btn-outline-success " onclick="func_btn3_on();" id="btn3_id_on">ON</span>
                                    </div>
                                    <div class="col-sm-6">
                                    <span class="btn btn-outline-danger " onclick="func_btn3_off();" id="btn3_id_off">off</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md">
                                        <label >Saklar 4</label>
                                    </div>
                                    <div class="col-md mb-2">
                                        <div class="input-group ">
                                            <input type="hidden"  type="text" class="form-control" name="value4" value="<?php $value4?>" id="value4">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 ">
                                    <span class="btn btn-outline-success " onclick="func_btn4_on();" id="btn4_id_on">ON</span>
                                    </div>
                                    <div class="col-sm-6">
                                    <span class="btn btn-outline-danger " onclick="func_btn4_off();" id="btn4_id_off">off</span>
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
  <script src="asset/js/button.js"></script>
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
			func_btn1_on();
    else
			func_btn1_off();
    if(btn2)
			func_btn2_on();
    else
			func_btn2_off();
    if(btn3)
			func_btn3_on();
    else
			func_btn3_off();
    if(btn4)
			func_btn4_on();
    else
			func_btn4_off();
    
  </script>

</body>

</html>
