<?php
// include database connection file
require_once'dbconfig.php';
if(isset($_POST['insert']))
{
// Posted Values
$Oano=$_POST['Oano'];
$Jobno=$_POST['Jobno'];
$Customerdetails=$_POST['Customerdetails'];
$Jobdetails=$_POST['Jobdetails'];
$HolotechRepresentative=$_POST['HolotechRepresentative'];
$Date1=$_POST['Date1']; 
// Query for Insertion
$sql="INSERT INTO salesorder(Oano,Jobno,Customerdetails,Jobdetails,HolotechRepresentative,Date1) VALUES(:Oano,:Jobno,:Customerdetails,:Jobdetails,:HolotechRepresentative,:Date1)";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':Oano',$Oano,PDO::PARAM_STR);
$query->bindParam(':Jobno',$Jobno,PDO::PARAM_STR);
$query->bindParam(':Customerdetails',$Customerdetails,PDO::PARAM_STR);
$query->bindParam(':Jobdetails',$Jobdetails,PDO::PARAM_STR);
$query->bindParam(':HolotechRepresentative',$HolotechRepresentative,PDO::PARAM_STR);
$query->bindParam(':Date1',$Date1,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='index.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CURD Operation using PDO Extension  </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Insert Record | PHP CRUD Operations using PDO Extension</h3>
<hr />
</div>
</div>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Oa No</b>
<input type="text" name="Oano" class="form-control" required>
</div>
<div class="col-md-4"><b>Job No</b>
<input type="text" name="Jobno" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-4"><b>Customer Details</b>
<input type="text" name="Customerdetails" class="form-control" required>
</div>
<div class="col-md-4"><b>Job Details</b>
<input type="text" name="Jobdetails" class="form-control" maxlength="10" required>
</div>
</div>
<div class="row">
<div class="col-md-8"><b>Holotech Representative</b>
<textarea class="form-control" name="HolotechRepresentative" required></textarea>
</div>
</div>
<div class="row">
<div class="col-md-8"><b>Date1</b>
<textarea class="form-control" name="Date1" required></textarea>
</div>
</div>
<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="insert" value="Submit">
</div>
</div>
</form>
</div>
</div>
</body>
</html>