<?php
  if (!isset($API_PATH[0])) { echo "No mid specified"; die(); }

  // $query = "IF NOT EXISTS(SELECT 1 FROM stats WHERE alpha=?)
  //           --THEN INSERT INTO stats (alpha, fries, total) VALUES (?,?,?)";
  // build_query($db, $query, array($API_PATH[1], $API_PATH[1], 1, 1));
  //
  // if ($stmt->store_result()) {
  //   goto a;
  // } else {
  //
  // }
  //
  // a:
  require_once("picture.php");
?>
