<?php session_start();
include '../initialize.php';

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else {
	$action = '';
}

if ($action == 'submitStaff') {
	
  if (!empty($_POST['staff_name'])) {
    //Capture variables
    $get_staff_name = mysqli_escape_string($connec, $_POST['staff_name']);
		$get_staff_location = mysqli_escape_string($connec, $_POST['staff_location']);

    //Insert user into table
		$sql = "INSERT INTO staff (name,locationId) VALUES ('$get_staff_name','$get_staff_location')";
    $result = mysqli_query($connec, $sql)
		or die(mysqli_error($connec));

		echo json_encode(array("success" => 1));

  } else {
    echo json_encode(array("success" => 0));
  }

}

?>
