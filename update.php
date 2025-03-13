<?php
include './userdata_update.php';
include './process.php';
if(isset($_POST['submit'])){
   $id=$_POST['id'];
   $name = $_POST['name'];
    $city = $_POST['city'];
    $password = $_POST['password'];

$obj1 = new DataHandle();

$result = $obj1->UpdateUserInfo($id,$name,$city,$password);
if($result){
  echo "done";
}
else{
  echo "erorr!!!";

}
}
else 
?>