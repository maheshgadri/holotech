<?php

session_start();
// $_SESSION['currentid'] = $emp_id;

if(empty($_SESSION['username']))
{
 header("location:register.php");


}


// if (isset($_POST['addorder'])){
// $conn = mysqli_connect("localhost","root","","holo");

//    $Oano =mysqli_real_escape_string($conn, $_REQUEST['Oano']);
//     $Jobno =mysqli_real_escape_string($conn, $_REQUEST['Jobno']);
//     $Customerdetails =mysqli_real_escape_string($conn, $_REQUEST['Customerdetails']);
//     $Jobdetails =mysqli_real_escape_string($conn, $_REQUEST['Jobdetails']);
//     $HolotechRepresentative =mysqli_real_escape_string($conn, $_REQUEST['HolotechRepresentative']);
    

//        $sql= "INSERT INTO salesorder(Oano,Jobno,Customerdetails,Jobdetails,HolotechRepresentative,emp_id)VALUES('$Oano',  '$Jobno', '$Customerdetails','$Jobdetails','$HolotechRepresentative')";
      
//        mysqli_close($conn);  

$con =new PDO("mysql:host=localhost;dbname=holo","root","");
  // if (isset($_POST['addorder'])){

  //   $Oano =$_POST['Oano'];
  //   $Jobno =$_POST['Jobno'];
  //   $Customerdetails =$_POST['Customerdetails'];
  //   $Jobdetails =$_POST['Jobdetails'];
  //   $HolotechRepresentative =$_POST['HolotechRepresentative'];
    
 
  

  //   $insert = $con->prepare ("INSERT INTO salesorder (Oano,Jobno,Customerdetails,Jobdetails,HolotechRepresentative)  VALUES (:Oano, :Jobno, :Customerdetails, :Jobdetails, :HolotechRepresentative)");
  //   $insert->execute(array(
  //     ':Oano' => $_POST['Oano'],
  //     ':Jobno' => $_POST['Jobno'],
  //     ':Customerdetails' => $_POST['Customerdetails'],
  //     ':Jobdetails' => $_POST['Jobdetails'],
  //     ':HolotechRepresentative' => $_POST['HolotechRepresentative'],
      
  //     ));
  // $_SESSION['success'] = "Record added";
    
  // // $insert = $con->prepare ("INSERT INTO salesorder (Oano,Jobno,Customerdetails,Jobdetails,HolotechRepresentative,emp_id ) VALUES (:Oano, :Jobno, :Customerdetails, :Jobdetails, :HolotechRepresentative,:emp_id)");
  // //   $insert->bindParam(':Oano',$Oano,PDO::PARAM_STR);
  // //   $insert->bindParam(':Jobno',$Jobno,PDO::PARAM_STR);
  // //   $insert->bindParam(':Customerdetails',$Customerdetails,PDO::PARAM_STR);
  // //   $insert->bindParam(':Jobdetails',$Jobdetails,PDO::PARAM_STR);
  // //   $insert->bindParam(':HolotechRepresentative',$HolotechRepresentative,PDO::PARAM_STR);
  // // //   $insert->bindParam(':emp_id',$emp_id,PDO::PARAM_STR);
  //   $insert->execute();
  // }
  
?>


<!doctype html>
<html >
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Holotech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>



    </ul>


  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>

<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['username']?>! You can now use this website</h3>
<hr>

</div>




<div class="sidenav">
  <a href="#addrecords">Add Records</a>
  <a href="vieworder.php">View Records</a>
  <a href="newadd.php">NewAdd Records</a>
</div>



<!-- <form action="" method="post">
  <div class="form-group">
    <label for="OA">OA No</label>
    <input type="oa" class="form-control" name="Oano" placeholder="Enter OA Number">

  </div>
  <div class="form-group">
    <label for="Job No">Job No</label>
    <input type="Job No" class="form-control" name="Jobno"  placeholder="Enter Job No">
  </div>
  <div class="form-group">
    <label for="Customer Details">Customer Details</label>
    <input type="Customer Details" class="form-control" name="Customerdetails" placeholder="Enter Customer Details">
  </div>
  <div class="form-group">
    <label for="Job Details">Job Details</label>
    <input type="Job Details" class="form-control" name="Jobdetails" i placeholder="Enter Job Details">
  </div>
  <div class="form-group">
    <label for="Holotech Representative">Holotech Representative</label>
    <input type="Holotech Representative" class="form-control" name="HolotechRepresentative"  placeholder="Holotech Representative">
  </div>

  <button type="submit" name= "addorder"class="btn btn-primary">Add Order</button>
</form> -->


<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/data.js"></script>	


<div class="container contact">	
	<h2>Sales Portal</h2>	
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="addOano" class="btn btn-success btn-xs">Add Oano</button>
				</div>
			</div>
		</div>
		<table id="salesList" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Oano</th>
					<th>Jobno</th>
					<th>Customerdetails</th>					
					<th>Jobdetails</th>
					<th>HolotechRepresentative</th>
										
					<th></th>
					<th></th>					
				</tr>
			</thead>
		</table>
	</div>
	<div id="employeeModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="employeeForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit User</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group"
							<label for=">Jobno" class="control-label">Jobno</label>
							<input type="text" class="form-control" id="Jobno" name="Jobno placeholder="Jobno" required>			
						</div>
						<div class="form-group">
							<label for="Customerdetails" class="control-label">Customerdetails</label>							
							<input type="text" class="form-control" id="Customerdetails" name="Customerdetails" placeholder="Customerdetails">							
						</div>	   	
						<div class="form-group">
							<label for="Jobdetails" class="control-label">Jobdetails</label>							
							<input type="text" class="form-control"  id="Jobdetails" name="Jobdetails" placeholder="Jobdetails" required>							
						</div>	 
						<div class="form-group">
							<label for="HolotechRepresentatives" class="control-label">HolotechRepresentative</label>							
							<textarea class="form-control" rows="5" id="HolotechRepresentative" name="HolotechRepresentative"></textarea>							
						</div>
						<!-- <div class="form-group">
							<label for="lastname" class="control-label">Designation</label>							
							<input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">			
						</div>						
    				</div> -->
    				<div class="modal-footer">
    					<input type="hidden" name="Oano" id="Oano" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
</div>	

<?php include('inc/footer.php');?>


<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 600px;
  width: 120px;
  position: fixed;
  z-index: 1;
  top: 58px;
  left: 0px;

   background :#B0B0B0;
  /* background: #eee; */
  overflow-x: hidden;
  padding: 8px 0;
}



form{
  margin-left: 300px;
  width: 600px;
}
h3 {
  text-align: center;
}
.sidenav a {
  padding: 70px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color:  #202020;
  display: block;
}

.sidenav a:hover {
  color: #064579;
}

.main {
  margin-left: 140px; /* Same width as the sidebar + left position in px */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>