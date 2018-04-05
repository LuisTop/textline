<?php session_start();
include '../initialize.php';

//Today's date
date_default_timezone_set('America/Puerto_Rico');
$today = date('m/d/Y', time());
  
  $clients = array();
  $sql = "SELECT * FROM clients";
  if ($result = mysqli_query($connec, $sql)) {
    while ($rows = mysqli_fetch_assoc($result)) {
      $appointment_day = date('m/d/Y', $rows['appointment']);
      if ($appointment_day == $today) {
        $appointment = date('m-d-Y h:i', $rows['appointment']);;
        $newClient = array('first_name'    => $rows['first_name'],
    										   'last_name'     => $rows['last_name'],
    										   'phone'         => $rows['phone'],
                           'record_number' => $rows['record_number'],
                           'appointment'   => $appointment);
    		array_push($clients, $newClient);
      }
    }
  	//Send clients data
    echo (json_encode(array('data' => $clients)));
    
  } else {
    echo json_encode(array("success" => 0));
  }
	



?>
