<?php
  if(isset($API_FUNC)) {
    $string = "";
    do {
      $num = rand(15,21);
      # LINK LOOKS LIKE: https://usna.blackboard.com/bbcswebdav/orgs/DEPTCSERV/Midn%20Photos/2020/M200516.jpg
      $string = "https://usna.blackboard.com/bbcswebdav/orgs/DEPTCSERV/Midn%20Photos/20".$num."/M".$num.sprintf("%'04d", rand(0,500)*6).".jpg";
    } while(!url_exists($string));
    echo json_encode($string);
  }

  function url_exists($url) {
    $bool = false;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    $result = curl_exec($curl);
    if ($result !== false) {
      $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      if ($statusCode == 404) {
        return $bool;
      } else {
        $bool = true;
      }
    } else {
      return $bool;
    }
    return $bool;
  }
?>
