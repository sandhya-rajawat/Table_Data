<html>
  <style >
    table {
  font-family: arial, sans-serif;
   width: 50%;
  margin-left: 25%;
  background-color: rgb(218, 159, 82)  ;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
  cursor: pointer;

 

 
}

td, th {
  border: 1px solid #fffafa;
  padding: 8px;

}


body{
  background-color: rgb(247, 237, 218);
}
#id{
  width: 20%;

}
#name{
  width: 30%;
}
#city{
  width:30%;

}
#password{
  width: 60%;
}

#upadte{
  width:40px;
}
.delete{
  width:30px;
}
.Update{
  background-color: green;
}
#delete{
  background-color: red;
}
#table{
  margin-right: 45%;
}
#tr{

   background-color: rgb(233, 208, 182);
  
   /* background-color: red; */
}
#td{
  width: 16%;
}
#tdname{
  width: 23%;
}


#idpassword{
  width: 35%;
} 
#id1{
border: 2px solid black;

}


a{
  display:flex;
  font-family: 'Times New Roman', Times, serif;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  /* border: 1px solid black; */
  width: 25px;
  font-size: 15px;
  font-weight:900;
  padding: 10px;
  color:black;
  transition: transform .1s;
  background-color: rgb(197, 131, 9);
  /* background-color: rgb(163, 160, 155); */
  border: 1px solid black;

  /* border-radius:15px; */

 
}


a:hover{
  background-color: rgba(255, 64, 0, 0.82);
  color:white;
  box-shadow: rgb(234, 27, 27) 0px 20px 30px -10px;
  border: 1px solid black;
 
transform: scale(1.0); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

button{
  border:none;
  background-color: rgb(247, 237, 218);
  
  border-radius:50%;
  margin-left:1%;
  margin-top:2%;
  /* box-shadow: rgba(252, 216, 10, 0.2) 0px 60px 40px -7px; */

}
div{
  margin-left:35%;
}

    
    </style>
 <body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
include './userdata_fetch.php';

include_once './process.php';
$obj1 = new DataHandle();
$result = $obj1->GetUserInfo(); 
// print_r($result);

// print_r($result);

// $arr=$result['arr'];
// print_r($arr);
// // echo "<br>";

// $pageno=$result['pageno'];
// echo $pageno;
// echo "<br>";
// $offset=$result['offset'];
// echo $offset;

// $total_pages=$result['totalpage'];
  // echo $totalpage;
  // echo "<br>";


// foreach($arr as $GetObj){


$pageno=$_SESSION['pageno'];
$total_pages=$_SESSION['total_pages'];

// search pagination;
$search_result= $obj1->search_pagination();
// print_r("this is print".$search_result);
if(is_array($search_result) || is_object($search_result)){
  foreach($search_result as $search_results){
  echo "
       <center>
    <table border='1' id='table'>
    <tr id='tr'> 
    <td id='td'>". $search_results['id']." </td>
    <td id='tdname'>". $search_results['name'] ."</td>
     <td id='idciyt'>".  $search_results['city']  ."</td>
      <td id='idpassword'> ". $search_results['password'] ." </td>
      
     </tr>
    </table> 
    </center>";
  }
}  

     

foreach($result as $GetObj){

echo "
  <center>
  <table border='1' id='table'>
  <tr id='tr'> 
  <td id='td'>". $GetObj['id']." </td>
  <td id='tdname'>". $GetObj['name'] ."</td>
   <td id='idcity'>".  $GetObj['city']  ."</td>
   <td id='idpassword'> ". $GetObj['password'] ." </td>
   <td >  <a href='http://localhost/UserInfo/insert.php'update_page_1.php?id=". $GetObj['id']."  class='Update'>Edit</a> </td>
   <td >  <a href='http://localhost/UserInfo/delete.php'delete_page_1.php?id=". $GetObj['id']." id='delete'>Delete </a> </td>
   </tr>
  </table> 
  </center>";


}
// $obj->close($conn); 
// <span><?php echo $pageno;
?>
 <div id="pagination">
 <button> <a href="<?php if($pageno <= 1){ echo '#';} else { echo "?pageno=".($pageno - 1); } ?>" id='link2'><<</a>
 </button>
 <button><a href="?pageno=1"><span>1</span></a></button>
  

<button><a href="?pageno=2" id="page2">2</a></button>
<button><a href="?pageno=3"id="page3">3</a></button>
<button><a href="?pageno=4"id="page4">4</a></button>
<button><a href="?pageno=5"id="page">5</a></button>


<button><a href="?pageno=<?php echo $total_pages; ?>" id="link4">>></a></button>



     
</div>
</body>
</html>
