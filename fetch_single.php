<?php 
include('database connection.php');
include('function.php');

if(isset($_POST["course_id"]))
{
    $output = array();
    $statement = $connection->prepare("SELECT * FROM salesorder1 WHERE id = '".$_POST["course_id"]."' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["id"] = $row["id"];
        $output["Oano"] = $row["Oano"];
        $output["Jobno"] = $row["Jobno"];
        $output["Customerdetails"] = $row["Customerdetails"];
        $output["Jobdetails"] = $row["Jobdetails"];
        $output["HolotechRepresentative"] = $row["HolotechRepresentative"];
        $output["Date1"] = $row["Date1"];
    }
    echo json_encode($output);
}



?>
                           