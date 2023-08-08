<?php
$databaseHost = 'https://pegawai.xcode.co.id/rahasia2';
$databaseName = 'xcode';
$databaseUsername = 'root';
$databasePassword = 'Powerled21';
$conn = new mysqli(
  $databaseHost,
  $databaseUsername,
  $databasePassword,
  $databaseName
);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>