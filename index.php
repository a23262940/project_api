<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    //讀取資料
    $url='http://localhost/project_api/api/post/read.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'rohit');
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    //echo "<pre>";
    //print_r($obj);
  
    $output = "<ul>";
    foreach ($obj['data1'] as $j){
      $output .= "<li>".$j['age']."</li>";
      $output .= "<li>".$j['name']."</li>";
      $output .= "<li>".$j['email']."</li>";
      $output .= "<br>";
    }
    $output .= "</ul>";
    echo $output;
     ?>

  </body>
</html>
