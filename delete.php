<?php
include './userdata_delete.php';
include "./process.php";
if(isset($_POST['submit'])){
        $id=$_POST['id'];

$obj1 = new DataHandle();
$result = $obj1->DeleteUserInfo($id);

if ($result) {
    echo "User deleted successfully!";
} 
}
else {
    echo false;
    
}
?>
