<?php
//限制允許的源頭
header('Access-Control-Allow-Origin: *');
//內容類型是 JSON 格式
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/post.php';

//建立資料庫物件與連接

$database= new Databases();
$db = $database->connect();

//Post database
$post=new post($db);

// use query

$result =$post->read();

//get row

$num=$result->rowCount();

//檢查是否有資料
if($num > 0){
  //$post_arr=array();
  $post_arr=array();

while($row = $result->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $post_item=array(
    'name'=>$name,
    'age'=>$age,
    'email'=>$email
  );
  array_push($post_arr, $post_item);
}
  echo json_encode($post_arr);
}
else{
  //no post
  echo json_encode(
    array('meassage' => 'NO POST FOUND!')
  );
}
 ?>
