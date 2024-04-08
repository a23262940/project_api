<?php
//限制允許的源頭
header('Access-Control-Allow-Origin: *');
//內容類型是 JSON 格式
header('Content-Type: application/json');
//允許使用 PUT 方法訪問
header('Access-Control-Allow-Methods:PUT');
//允許跨域請求
header('Access-Control-Allow-Headers:
Access-Control-Allow-Headers,
Content-Type,
Access-Control-Allow-Methods,
 Authorization, X-Requested-With');

include_once '../../config/database.php';
include_once '../../models/post.php';

//建立資料庫物件與連接

$database= new Databases();
$db = $database->connect();

//Post database
$post=new post($db);

//GET posted data

$data=json_decode(file_get_contents("input.json"));
$post->name=$data->name;
$post->age=$data->age;
$post->email=$data->email;

if ($post->update()) {
  echo json_encode(array('message'=>'Post updated'));
}
else {
  echo json_encode(array('message'=>'NOT updated!'));
}
 ?>
