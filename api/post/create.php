<?php
//限制允許的源頭
header('Access-Control-Allow-Origin: *');
//內容類型是 JSON 格式
header('Content-Type: application/json');
//允許使用 POST 方法訪問
header('Access-Control-Allow-Methods:POST');
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

$data=json_decode(file_get_contents("php://input"));

$post->name=$data->name;
$post->age=$data->age;
$post->email=$data->email;

if ($post->create()) {
  echo json_encode(array('message'=>'Post Created'));
}
else {
  echo json_encode(array('message'=>'NOT Created!'));
}
 ?>
