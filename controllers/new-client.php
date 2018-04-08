<?php session_start();
include '../initialize.php';

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else {
	$action = '';
}

if ($action == 'submitNewClient') {

	if (!empty($_POST['first_name'])) {
		//Capture variables
		$get_client_name 							= mysqli_escape_string($connec, $_POST['first_name']);
		$get_client_lastname				  = mysqli_escape_string($connec, $_POST['last_name']);
		$get_client_phone 						= mysqli_escape_string($connec, $_POST['phone']);
		$get_client_record_number 		= mysqli_escape_string($connec, $_POST['record_number']);
		$get_staff_name	  						= mysqli_escape_string($connec, $_POST['staff_name']);
		$get_appointment  						=	mysqli_escape_string($connec, $_POST['appointment']);
		$get_id 									  	=	mysqli_escape_string($connec, $_POST['locationId']);

		//Insert user into table
		$sql = "INSERT INTO clients (first_name, last_name, phone, record_number, staffId, appointment, locationId, closed) VALUES ('$get_client_name','$get_client_lastname','$get_client_phone','$get_client_record_number','$get_staff_name','$get_appointment','$get_id', 0)";
		$result = mysqli_query($connec, $sql)
		or die(mysqli_error($connec));

		echo json_encode(array("success" => 1));

	} else {
		echo json_encode(array("success" => 0));
	}

}

?>
