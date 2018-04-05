<?php session_start();
include 'initialize.php';

if (!isset($_SESSION['id'])) {
  header("Location: pages/login.php");
}
?>
