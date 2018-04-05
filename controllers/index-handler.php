<?php session_start();
include '../initialize.php';

$action = $_POST['action'];

if ($action == 'deactivate') {

  if(!empty($_POST['keyid'])){
    //Capture variables
		$get_keyid 		= mysqli_escape_string($_POST['keyid']);

    //Insert user into table
		$sql = "UPDATE coco_keys SET isactive = 'false' WHERE keyid = '$get_keyid'";
		$result = mysqli_query($connec, $sql);

  } else {
    echo "No post data";
  }

}


?>
