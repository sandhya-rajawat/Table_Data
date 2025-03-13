
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
include_once "./DB.php";


class DataHandle
{  
// fetch..................................................
    function GetUserInfo(){
        $obj=new DataConnect();
        $con= $obj->connect();  

      //   create pagnation..............



      // search pagination.................................

 if(isset($_GET['pageno'])){
            $pageno=$_GET['pageno'];
              }else{
                $pageno=1;
           }
              $limit=7;
              $offset=($pageno-1) * $limit;
           
             $request="SELECT count(*) as count  FROM UserInfo";
               $Reresult=mysqli_query($con,$request);
               $total_rows=mysqli_fetch_array($Reresult)[0];
               $total_pages = ceil($total_rows / $limit);
               $_SESSION['pageno']=$pageno;
               $_SESSION['total_pages']=$total_pages;
               $_SESSION['Offset']=$offset;
               

            //   echo "Total_pages:".$total_pages; 
            //   echo "<br>";
            //   echo "Offset:".$offset;
            //   echo "<br>";
            //   echo "total_rows:",$total_rows;
            //   echo "<br>";

                       // DB connection................

               $sql ="SELECT * FROM UserInfo  ORDER BY id  ASC LIMIT $offset, $limit "; 
       $result =mysqli_query($con,$sql);
      



       $arr=[];
       if(mysqli_num_rows($result)>0){
         while($Data= mysqli_fetch_assoc($result))

          $arr[]=$Data;
          return $arr;
      
          }
      //      return[
      //      'offset' => $offset,
      //      'pageno' => $pageno,
      //     'totalpage'=>$total_pages
      //  ];

}




//  delete.................................................................||
   function DeleteUserInfo($id){
      $obj=new DataConnect();
       $con=$obj->connect();
      $sql="DELETE FROM UserInfo WHERE id=$id";
      $result =mysqli_query($con,$sql);
      if(($result)>0)
        {
          return $result;
        }
        else{
            return null;
         }
        } 
#insert...................................................................

   function InsertUserInfo($id,$name,$city,$password){
       $obj=new DataConnect();
    $con=$obj->connect(); 
    $sql="INSERT INTO  UserInfo(id,name,city,password)
    VALUES('$id','$name','$city','$password')";
     $result=mysqli_query($con,$sql);
  
    if($result){
     return $result;
   }
    else{
     return (mysqli_error($con));
    }
 }

//  update.............................................................

   function UpdateUserInfo($id,$name,$city,$password){
   $obj=new DataConnect();
   $con=$obj->connect(); 
   $sql="UPDATE UserInfo
   SET name='$name', city='$city', password='$password'
   WHERE id='$id'";
   $result=(mysqli_query($con,$sql));
   if($result){
      echo "successful";
      return $result;
   }
   else{
      return (mysqli_error($con));
   }
}


function  search_pagination(){
  
   $obj=new DataConnect();
   $con=$obj->connect(); 
if (isset($_POST['submit'])) {
  $id=$_POST['name'];
      $name = mysqli_real_escape_string($con, $_POST['name']);
      // $city=mysqli_real_escape_string($con, $_POST['city']);
      // $password=$_POST['password'];
      $sql = "SELECT * FROM UserInfo WHERE name LIKE '%$name%' ";
      
      $result = mysqli_query ($con, $sql);
      $queryResult = mysqli_num_rows($result);
  
    //   echo " ".$queryResult." RESULTS";
  $arr_search=[];
      if ($queryResult > 0){
          while ($row = mysqli_fetch_assoc($result))
            $arr_search[]=$row;
    return  $arr_search;
              
      }   
  }
  
}



}

?>  