<?php 

//Today's date
date_default_timezone_set('America/Puerto_Rico');
$today = date('m/d/Y', time());
  
  $today_clients_count = 0;
  $sql = "SELECT * FROM clients";
  if ($result = mysqli_query($connec, $sql)) {
    while ($rows = mysqli_fetch_assoc($result)) {
      $appointment_day = date('m/d/Y', $rows['appointment']);
      if ($appointment_day == $today) {
        $today_clients_count ++;
      }
    }
  }
	



?>
