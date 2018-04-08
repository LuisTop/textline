<?php session_start();
include '../initialize.php';

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else {
	$action = '';
}

if ($action == 'submitLocation') {

  if (!empty($_POST['location_name'])) {
    //Capture variables
    $get_location_name = mysqli_escape_string($connec, $_POST['location_name']);
		$get_location_type = mysqli_escape_string($connec, $_POST['location_type']);
		$get_can_register  = mysqli_escape_string($connec, $_POST['can_register']);
		$get_record_number = mysqli_escape_string($connec, $_POST['record_number']);
		$get_location_pin  = mysqli_escape_string($connec, $_POST['location_pin']);
		
    //Insert user into table
		$sql = "INSERT INTO locations (name,type,canRegister,recordNumber,pin) VALUES ('$get_location_name','$get_location_type','$get_can_register','$get_record_number','$get_location_pin')";
    $result = mysqli_query($connec, $sql)
		or die(mysqli_error($connec));
		
		echo json_encode(array("success" => 1));

  } else {
    echo json_encode(array("success" => 0));
  }

}

?>
