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

//GET name ?=than :=else
$post->name=isset($_GET['name']) ? $_GET['name'] : die();

//echo $post;

// use query
$post->read_once();

$post_item=array(
  'name'=>$post->name,
  'age'=>$post->age,
  'email'=>$post-> email
);
print_r(json_encode($post_item));

 ?>
