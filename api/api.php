<?php
  if (!isset($_GET['path'])) { echo "Invalid API Call"; die(); }

  define('DATABASE_MYSQL',
          array('host'=>'midn.cs.usna.edu',
                'user'=>'m200516',
                'password'=>'now',
                'name'=>'m200516'));

  require_once("../lib/lib_mysql.php");
  require_once("../lib/lib_uuid.php");
  require_once("../lib/lib_csv.php");

  $db = connect_db(DATABASE_MYSQL['host'],
                   DATABASE_MYSQL['user'],
                   DATABASE_MYSQL['password'],
                   DATABASE_MYSQL['name']);

  $temp = explode("/", $_GET['path']);
  $API_ROLE = "default";
  $API_FUNC = $temp[0];
  $API_PATH = array();
  for ($i = 1; $i < sizeof($temp); $i++) {
    $API_PATH[$i-1] = $temp[$i];
  }

  if (!file_exists("scripts/".$API_FUNC.".php")) { echo "Invalid Script Requested"; die(); }
  require_once("scripts/".$API_FUNC.".php");
?>
