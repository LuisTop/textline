<?php session_start();
include '../initialize.php';

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else {
	$action = '';
}

if ($action == 'login') {

	if(!empty($_POST['email']) && !empty($_POST['password'])){
    //Capture variables
		$get_email 		= mysqli_escape_string($connec, $_POST['email']);
		$get_password = mysqli_escape_string($connec, $_POST['password']);
		
		$sql = "SELECT password FROM users WHERE email = '$get_email'";
		if($result = mysqli_query($connec, $sql)) {
			while($rows = mysqli_fetch_assoc($result)) {
				$password_hash = $rows['password'];
			}
		}
		
		if (password_verify($get_password, $password_hash)) {
			//Validate information
			$sql = "SELECT * FROM users WHERE email = '$get_email'";
			if($result = mysqli_query($connec, $sql)) {
				while($rows = mysqli_fetch_assoc($result)) {
					if (mysqli_num_rows($result) == 1) {
	          //Create session
						$_SESSION['id'] 				= $rows['id'];
	          $_SESSION['first_name'] = $rows['first_name'];
						$_SESSION['last_name'] 	= $rows['last_name'];
	          $_SESSION['email'] 			= $rows['email'];
						$_SESSION['location'] 	= $rows['location'];
						echo json_encode(array("success" => 1));
					} else {
						echo json_encode(array("success" => 0));
					}
				}
			} else {
				echo json_encode(array("success" => 0));
			}
	  } else {
	    echo json_encode(array("success" => 0));
	  }
	} else {
		echo json_encode(array("success" => 0));
	}

} else if ($action == 'signup') {

  if (!empty($_POST['email']) && !empty($_POST['password'])){
    //Capture variables
    $get_first_name = mysqli_escape_string($connec, $_POST['first_name']);
		$get_last_name  = mysqli_escape_string($connec, $_POST['last_name']);
		$get_email    	= mysqli_escape_string($connec, $_POST['email']);
		
		$get_password = mysqli_escape_string($connec, $_POST['password']);
  	$password = password_hash($get_password, PASSWORD_BCRYPT);

    //Insert user into table
		$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$get_first_name', '$get_last_name', '$get_email', '$password')";
    $result = mysqli_query($connec, $sql)
		or die(mysqli_error($connec));

  } else {
    echo "No post data";
  }

} else if ($action == 'forgotPassword') {

  if(!empty($_POST['email'])) {
    //Capture variables
		$get_email = mysqli_escape_string($_POST['email']);

    //Look for password in database
		$sql = "SELECT * FROM users WHERE email = '$get_email'";
    if ($result = mysqli_query($connec, $sql)) {
			while($rows = mysqli_fetch_assoc($result)) {
				if (mysqli_num_rows($result) == 1) {
					$user_password = $rows['password'];
          $user_email = $get_email;
          // the message
          $msg = "Hello!\nYour password is: $user_password";
          // use wordwrap() if lines are longer than 70 characters
          $msg = wordwrap($msg,70);
          // send email
          mail($user_email,"Password Recovery",$msg);
          echo "Email was sent";
				} else {
          echo "Email was not sent";
				}
			}
		} else {
      echo "Query error";
		}

  } else {
    echo "No email posted";
  }

}

?>
