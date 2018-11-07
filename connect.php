<?php
define('DB_HOST', 'localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','omts');

function connect()
{

  $connect = new mysqli(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);
  if ($connect->connect_errno)
  {
    die("Failed to connect:" . $connect->connect_error());
  }
    $connect->set_charset("utf8");
    
  return $connect;

}

?>
