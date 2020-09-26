<?php
require('config.php');
class Salesportal extends Dbconfig {	
    protected $hostName;
    protected $userName;
    protected $password;
	protected $dbName;
	private $salesorder = 'salesorder';//table
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 		
			$database = new dbConfig();            
            $this -> hostName = $database -> serverName;
            $this -> userName = $database -> userName;
            $this -> password = $database ->password;
			$this -> dbName = $database -> dbName;			
            $conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}   	
	public function salesList(){		
		$sqlQuery = "SELECT * FROM ".$this->salesorder." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(Oano LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR Jobno LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR Customerdetails LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR Jobdetails LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR HolotechRepresentative LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$salesData = array();	
		while( $sales = mysqli_fetch_assoc($result) ) {		
			$empRows = array();			
			$empRows[] = $salesorder['Oano'];
			$empRows[] = ucfirst($salesorder['Jobno']);  
			$empRows[] = $salesorder['Customerdetails'];		
			$empRows[] = $salesorder['Jobdetails'];	
			$empRows[] = $salesorder['HolotechRepresentative'];
						
			$empRows[] = '<button type="button" name="update" id="'.$salesorder["Oano"].'" class="btn btn-warning btn-xs update">Update</button>';
			$empRows[] = '<button type="button" name="delete" id="'.$salesorder["Oano"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$salesData[] = $empRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$salesData
		);
		echo json_encode($output);
	}
	public function getOano(){
		if($_POST["Oano"]) {
			$sqlQuery = "
				SELECT * FROM ".$this->salesorder." 
				WHERE Oano = '".$_POST["Oano"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQL_ASSOC);
			echo json_encode($row);
		}
	}
	public function updateOano(){
		if($_POST['Oano']) {	
			$updateQuery = "UPDATE ".$this->salesorder." 
			SET  Jobno = '".$_POST["Jobno"]."', Customerdetails = '".$_POST["Customerdetails"]."', Jobdetails = '".$_POST["Jobdetails"]."' , HolotechRepresentative = '".$_POST["HolotechRepresentative"]."'
			WHERE Oano ='".$_POST["Oano"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	public function addOano(){
		$insertQuery = "INSERT INTO ".$this->salesorder." (Jobno, Customerdetails, Jobdetails, HolotechRepresentative) 
			VALUES ('".$_POST["Jobno"]."', '".$_POST["Customerdetails"]."', '".$_POST["Jobdetails"]."', '".$_POST["HolotechRepresentative"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}
	public function deleteOano(){
		if($_POST["Oano"]) {
			$sqlDelete = "
				DELETE FROM ".$this->salesorder."
				WHERE Oano = '".$_POST["Oano"]."'";		
			mysqli_query($this->dbConnect, $sqlDelete);		
		}
	}
}
?>