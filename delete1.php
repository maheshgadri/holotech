<?php
$connect = mysqli_connect("localhost", "root", "", "holo");
if(isset($_POST["Oano"]))
{
 $query = "DELETE FROM salesorder WHERE Oano = '".$_POST["Oano"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>
