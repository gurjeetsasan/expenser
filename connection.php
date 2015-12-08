<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//** Class to connect the database **//

define('HOST','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DATABASE','expenser');


class  Expenser{
	var $connection;

	function __construct(){
		/* make connection to database. */

		// Create connection
		$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}else{
			$this->connection  = $conn;			
		}
	}

	/* function to add category */
	function addCategory( $data = null ){

		$categoryname 	=	$data['categoryname'];
		$description 	=	$data['description'];
		$user_id 		=	$data['user_id'];

		if( $data == null ){
			$resultArray['status'] 	= 'error';
			$resultArray['message'] = "Error, Input Parameters error.";
			echo json_encode($resultArray);
			return true;
		}

		$sql = "INSERT INTO `categories`( `categoryname`, `description`, `user_id` )
					VALUES ('".$categoryname."','".$description."', '".$user_id."')";


		$resultArray 	= array();					
		if ( $this->connection->query($sql) === TRUE) {
		    $resultArray['status'] 	= 'success';
			$resultArray['message'] = "New category created successfully";
		}else{
			$resultArray['status'] 	= 'error';
			$resultArray['message'] = "Error, Category not created.";
		}

		echo json_encode( $resultArray );
	}


	/* function to get the list of categoories */
	function getCategories(){

		$sql = "SELECT * FROM `categories`;";
		$result = mysqli_query( $this->connection , $sql);

		$resultArray 	= array();
		$dataArray 		= array();


		if( $result->num_rows > 0){
			while ($row = mysqli_fetch_assoc( $result ) ){
				$dataArray[] = $row;
			}

			$resultArray['status'] = 'success';
			$resultArray['data'] = $dataArray;
		}else{

			$resultArray['status'] 	= 'error';
			$resultArray['message'] = "No Category Found.";
		}

		/*reuturn result*/
		echo json_encode($resultArray);
	}

	/*fucntion to add Dailies */
	function addDailies( $data = null ){
		
	}



	/*functions to get the list of dailies. */
	function getDailies( $userID = '' ){
		$sql = "SELECT * FROM `dailies`;";
		$result = mysqli_query( $this->connection , $sql);

		$resultArray 	= array();
		$dataArray 		= array();


		if( $result->num_rows > 0){
			while ($row = mysqli_fetch_assoc( $result ) ){
				$dataArray[] = $row;
			}

			$resultArray['status'] = 'success';
			$resultArray['data'] = $dataArray;
		}else{

			$resultArray['status'] 	= 'error';
			$resultArray['message'] = "No Daily Created.";
		}

		/*reuturn result*/
		echo json_encode($resultArray);	
	}

}


$expenser = new Expenser;
$data['categoryname']	=	'test-category';
$data['description']	=	'test-category Descriptions';
$data['user_id']		=	'1';

$expenser->addCategory($data);