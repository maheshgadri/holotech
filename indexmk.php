<?php
// include database connection file
require_once'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CRUD Operations using PDO Extension </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style >
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>PHP CRUD Operations using PDO Extension</h3> <hr />
<a href="insert.php"><button class="btn btn-primary"> Insert Record</button></a>
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">
<thead>
<th>#</th>
<th>Oa No</th>
<th>Job No</th>
<th>Customer Details</th>
<th>Job Details</th>
<th>Holotech Representative</th>
<th>Date1</th>
<th>Edit</th>
<th>Delete</th>
</thead>
<tbody>
<?php
$sql = "SELECT id,Oano,Jobno,Customerdetails,Jobdetails,HolotechRepresentative,Date1 from salesorder";
//Prepare the query:
$query = $dbh->prepare($sql);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{
?>
<!-- Display Records -->
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($result->Oano);?></td>
    <td><?php echo htmlentities($result->Jobno);?></td>
    <td><?php echo htmlentities($result->Customerdetails);?></td>
    <td><?php echo htmlentities($result->Jobdetails);?></td>
    <td><?php echo htmlentities($result->HolotechRepresentative);?></td>
    <td><?php echo htmlentities($result->Date1 );?></td>
<td><a href="update.php?id=<?php echo htmlentities($result->id);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
<td><a href="index.php?del=<?php echo htmlentities($result->id);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
    </tr>
<?php
// for serial number increment
$cnt++;
}} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>