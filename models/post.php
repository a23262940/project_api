<?php
 class post{
   //資料庫
   private $conn;
   private $table='web';

   //欄位
   public $name;
   public $age;
   public $email;

   public function __construct($db){
     $this->conn = $db;
   }
   //搜尋資料
   public function read(){
     $query='select * from '. $this->table;
     //參數化查詢
     $stmt = $this->conn->prepare($query);
     $stmt->execute();;
     return $stmt;
   }

   //搜尋特定且為單一的資料
   public function read_once(){
     $query='select * from '. $this->table. ' where name = :name ';

     $stmt = $this->conn->prepare($query);

     //清理資料裡特定的標籤
     $stmt->bindValue(':name',$this->name);

     $stmt->execute();
     //echo "read done1";
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
     $this->name = $row['name'];
     $this->age= $row['age'];
     $this->email= $row['email'];
   }
   //新增資料
   public function create(){
     $query='insert into '. $this->table. ' set
     name=:name,
     age=:age,
     email=:email';

     $stmt = $this->conn->prepare($query);

     //清理資料裡特定的標籤
     $this->name= htmlspecialchars(strip_tags($this->name));
     $this->age= htmlspecialchars(strip_tags($this->age));
     $this->email= htmlspecialchars(strip_tags($this->email));

     //根據資料庫欄位綁定資料
     $stmt->bindValue(':name',$this->name);
     $stmt->bindValue(':age',$this->age);
     $stmt->bindValue(':email',$this->email);
     if ($stmt->execute()) {
       return true;
     }
       return false;
       printf("Error: %s. \n", $stmt->error);
   }

 //修改資料
 public function update(){
   $query='update data set age=:age, email=:email where name=:name';

   $stmt = $this->conn->prepare($query);

   //清理資料裡特定的標籤
   $this->name= htmlspecialchars(strip_tags($this->name));
   $this->age= htmlspecialchars(strip_tags($this->age));
   $this->email= htmlspecialchars(strip_tags($this->email));

   //根據資料庫欄位綁定資料
   $stmt->bindValue(':name',$this->name);
   $stmt->bindValue(':age',$this->age);
   $stmt->bindValue(':email',$this->email);
   if ($stmt->execute()) {
     return true;
   }
     return false;
     printf("Error: %s. \n", $stmt->error);
 }

 //刪除資料
 public function delete(){
   $query='delete from data where name=:name';

   $stmt = $this->conn->prepare($query);

   //清理資料裡特定的標籤
   $this->name= htmlspecialchars(strip_tags($this->name));

   //根據資料庫欄位綁定資料
   $stmt->bindValue(':name',$this->name);
   if ($stmt->execute()) {
     return true;
   }
     return false;
     printf("Error: %s. \n", $stmt->error);
 }
}

 ?>
