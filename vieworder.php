<?php

session_start();

if(empty($_SESSION['username']))
{
 header("location:register.php");
}
?>
<!-- // $con =new PDO("mysql:host=localhost;dbname=holo","root","");
// $conn = mysqli_connect("localhost", "root","");

// $db= mysqli_select_db($conn,'holo');

// if (isset($_POST['view']))
// {

//   // $query ="SELECT * FROM 'salesorder'";
//   // $query_run = mysqli_query($conn,$query);
//   $result = mysqli_query($conn, "SELECT * FROM salesorder") or die("Error: " . mysqli_error($conn));
  
//   while($row = mysqli_fetch_array($result))
// {
  // 

// }
// }
// $sql = "SELECT * FROM salesorder";
// if($result = mysqli_query($conn, $sql)){
//     if(mysqli_num_rows($result) > 0){
//         echo "<table>";
//             echo "<tr>";
//                 echo "<th>Oano</th>";
//                 echo "<th>Jobno</th>";
//                 echo "<th>Customerdetails</th>";
//                 echo "<th>Jobdetails</th>";
//                 echo "<th>HolotechRepresentative</th>";
//                 // echo "<th>emp_id</th>";
//             echo "</tr>";
//         while($row = mysqli_fetch_array($result)){
//             echo "<tr>";
//                 echo "<td>" . $row['Oano'] . "</td>";
//                 echo "<td>" . $row['Jobno'] . "</td>";
//                 echo "<td>" . $row['Customerdetails'] . "</td>";
//                 echo "<td>" . $row['Jobdetails'] . "</td>";
//                 echo "<td>" . $row['HolotechRepresentative'] . "</td>";
//                 // echo "<td>" . $row['emp_id'] . "</td>";
//             echo "</tr>";
//         }
//         echo "</table>";
//         // Free result set
//         mysqli_free_result($result);
//     } else{
//         echo "No records matching your query were found.";
//     }
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
// }
 
// // Close connection
// mysqli_close($conn);
  // if (isset($_POST['vieworder'])){

  //   // $Oano =$_POST['Oano'];
  //   // $Jobno =$_POST['Jobno'];
  //   // $Customerdetails =$_POST['Customerdetails'];
  //   // $Jobdetails =$_POST['Jobdetails'];
  //   // $HolotechRepresentative =$_POST['HolotechRepresentative'];
    
  //   $stmt = $con->prepare ("SELECT *FROM salesorder WHERE emp_id=?");
  //   $stmt ->execute(array(':Oano' => $Oano));
  //   $stmt->execute([$emp_id]); 
  //   $user = $stmt->fetch();

    // $insert->bindParam(':OANo',$OANo,PDO::PARAM_STR);
    // $insert->bindParam(':JobNo',$JobNo,PDO::PARAM_STR);
    // $insert->bindParam(':CustomerDetails',$CustomerDetails,PDO::PARAM_STR);
    // $insert->bindParam(':JobDetails',$JobDetails,PDO::PARAM_STR);
    // $insert->bindParam(':HolotechRepresentative',$HolotechRepresentative,PDO::PARAM_STR);

    // $insert->execute(); -->





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
<a href= "addorder.php">Add Records</a>
  <a href="vieworder.php">View Records</a>

</div>



<!-- <form action="" method="post">
  <div class="form-group">
    <label for="OA No">OA No</label>
    <input type="OANo" class="form-control" id="OANo" name="OANo"aria-describedby="emailHelp" placeholder="OANo">

  </div>
  <div class="form-group">
    <label for="JobNo">Job No</label>
    <input type="JobNo" class="form-control" name="JobNo"id="JobNo" placeholder="JobNo">
  </div>
  <div class="form-group">
    <label for="CustomerDetails">Customer Details</label>
    <input type="CustomerDetails" class="form-control" name="CustomerDetails"id="CustomerDetails "placeholder="CustomerDetails">
  </div>
  <div class="form-group">
    <label for="JobDetails">JobDetails</label>
    <input type="JobDetails" class="form-control" name="JobDetails" id="JobDetails" placeholder="JobDetails">
  </div>
  <div class="form-group">
    <label for="HolotechRepresentative">HolotechRepresentative</label>
    <input type="HolotechRepresentative" class="form-control"name="HolotechRepresentative" id="HolotechRepresentative" placeholder="HolotechRepresentative">
  </div>
  
  <button type="submit" onclick="addodrder.php"name= "addorder"class="btn btn-primary">Add Order</button>
  <button type="submit" onclick="addodrder.php"name= "vieworder"class="btn btn-primary">View Order</button>
</form>
   -->

 
   <h1>Sales Data</h1>
  

   <div class="card">
            <div class="card-body">

            <
                <form action="" method="POST">
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> Oano</th>
                            <th scope="col">Jobno</th>
                            <th scope="col">Customerdetails</th>
                            <th scope="col"> Jobdetails </th>
                            <th scope="col">HolotechRepresentative </th>
                            <!-- <th scope="col"> EDIT </th> -->
                            <!-- <th scope="col"> DELETE </th> -->
                        </tr>
                    </thead>
                  
                  <input type="submit" class= "btn"name="view" value="View Orders" ><br><br>
                  <input type="submit" class= "btn"name="delete" value="Delete Orders" ><br><br>
                    <tbody>
                    <?php
                $conn = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($conn, 'holo');
                if (isset($_POST['view']))
               {
                // $query = "SELECT * FROM salesorder";
                // $query_run = mysqli_query($conn, $query);
                $result = mysqli_query($conn, "SELECT * FROM salesorder") or die("Error: " . mysqli_error($conn));
                while($row=mysqli_fetch_array($result))
{
            ?>
                        <tr>
                            <td> <?php echo $row['Oano']; ?> </td>                            
                            <td> <?php echo $row['Jobno']; ?> </td>                            
                            <td> <?php echo $row['Customerdetails']; ?> </td>                            
                            <td> <?php echo $row['Jobdetails']; ?> </td>                            
                            <td> <?php echo $row['HolotechRepresentative']; ?> </td>                            
                            
                                <!-- <button type="button" class="btn btn-success editbtn"> EDIT </button>
                            </td> 
                            
                            <td>
                                <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                            </td> -->
                       
                        </tr>
                        <?php
    }

?>
                    </tbody>
            <?php           
                    }
                
                else 
                {
                    echo "No Record Found";
                }
            ?>
           
                </table>
              </from>
            </div>
        </div>


    </div>
</div>
<script>
$(document).on('click', '.delete', function(){
   var id = $(this).attr("Oano");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{Oano:Oano},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#salesorder_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>


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

.table table-bordered table-dark{
 
  border:1px solid black;
  height:100px;
  width:1px;
  background-color: grey;
}
.btn{
  
  width: 20%;
  height: 5%;
  font-weight: bold;

  background-color: #008CBA;
   

}
h1 {
    text-align: center;
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