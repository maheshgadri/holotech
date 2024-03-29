<?php 
include('database connection.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM salesorder1 ";
if(isset($_POST["search"]["value"]))
{
    $query .= 'WHERE Oano LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR Jobno LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY id ASC ';
}

if($_POST["length"] != -1)
{
    $query .= 'LIMIT ' .$_POST['start']. ', ' .$_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
    $sub_array = array();

    $sub_array[] = $row["id"];
    $sub_array[] = $row["Oano"];
    $sub_array[] = $row["Jobno"];
    $sub_array[] = $row["Customerdetails"];
    $sub_array[] = $row["Jobdetails"];
    $sub_array[] = $row["HolotechRepresentative"];
    $sub_array[] = $row["Date1"];
    $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-primary btn-sm update">Edit</button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Delete</button>';
    $data[] = $sub_array;
}
$output = array(
    "draw"              =>  intval($_POST["draw"]),
    "recordsTotal"      =>  $filtered_rows,
    "recordsFiltered"   =>  get_total_all_records(),
    "data"              =>  $data
);
echo json_encode($output);
?>
                           