<?php
class DataConnect{
 private $servername;
 private $username;
 private $password;
 private $database;
public function __construct()
{
   $this->servername="localhost";
   $this->username="root";
   $this->password="";
   $this->database="UserDetail";
}
public function connect(){
$conn=mysqli_connect($this->servername,$this->username,$this->password,$this->database);
return $conn;
}
public function close($conn){
mysqli_close($conn);
}
}


?>