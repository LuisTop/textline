<?php session_start();
include '../initialize.php';

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else {
	$action = '';
}

if ($action == 'submitClient') {

  if (!empty($_POST['appointment'])) {
    //Capture variables
    $get_first_name 	 = mysqli_escape_string($connec, $_POST['first_name']);
		$get_last_name  	 = mysqli_escape_string($connec, $_POST['last_name']);
		$get_phone    		 = mysqli_escape_string($connec, $_POST['phone']);
		$get_location   	 = mysqli_escape_string($connec, $_POST['location']);
		$get_record_number = mysqli_escape_string($connec, $_POST['record_number']);
		$get_appointment   = mysqli_escape_string($connec, $_POST['appointment']);

    //Insert user into table
		$sql = "INSERT INTO clients (first_name, last_name, phone, location, record_number, appointment) VALUES ('$get_first_name', '$get_last_name', '$get_phone', '$get_location', '$get_record_number', '$get_appointment')";
    $result = mysqli_query($connec, $sql)
		or die(mysqli_error($connec));
		
		echo json_encode(array("success" => 1));

  } else {
    echo json_encode(array("success" => 0));
  }

}

?>
