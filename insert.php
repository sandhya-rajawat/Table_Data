<?php 
include './userdata_insert.php';
include './process.php';
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $password = $_POST['password'];

$obj1 = new DataHandle();
$result = $obj1->InsertUserInfo($id,$name,$city,$password); 
if($result){
    echo "<script>alert('data insert')</script>";
}
}
else{
    echo "<script>alert('data  not insert')</script>";
}

// $obj->close($conn); 
?>










