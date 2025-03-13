<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='./edittables_fetch.css'>
    <title>Document</title>
    <style>
        div{
            display:flex;
            
            text-align:center;
    }
      
h1{ margin-left:2%; 
            margin-top:5%; 
            cursor:pointer;
          
        
            font-size:15px;
             background-color:white;
             width:50px; 
             border-radius:5px;
            border:1px solid gray;
            width: 100px;
        } 
        h1:hover{  
            background-color:gray;
            color:white;
        }

         #search_pagination_form_input{
         padding-left:3%;
         padding-top:5px;
         padding-bottom:5px;
         border-right:1px solid black;
         background-color:white;
         margin-left:55%;
       
         /* border:none; */
         border-radius:5px;
         cursor: pointer;
        

         }
         #search_pagination_form_input:hover{
            background-color:gray;
       
         }  
         #search_pagination_submit{
            font-size:20px;
            cursor: pointer;
            background-color:white;
            
         }
         #search_pagination_submit:hover{
            background-color:gray;
        }
        </style>
    <link rel=stylesheet href='./edittable.css'>
</head>
<body>


   <!--php start  -->
<div>

<h1 id='headline1'><?php 
include './process.php';
$obj2 = new DataHandle();
$result2 = $obj2->GetUserInfo(); 
$pageno=$_SESSION['pageno'];
 print_r("Page_No : ".$pageno);


?></h1>
<h1><?php
 $total_pages=$_SESSION['total_pages'];
print_r("Total_Pages : ".$total_pages);
?>
    </h1>
<h1 id="offset"><?php
    $offset=$_SESSION['Offset'];
    print_r("OffSet :".$offset);
    
?></h1>
</h1>
</div>
   <!--php end -->
        
      
            <form action='./fetch.php' Method='POST' id='search_pagination_form'>
                <input type="text" placeholder="Enter Your Name" name="name" id='search_pagination_form_input'>
            <input type='submit' value='Check!' name='submit' id='search_pagination_submit'>
             </form>    
      

<table border='1' id="table2">
    <tr class="tr">
    <th id="id">ID</th>
   <th id='name'>NAME</th>
   <th id='city'>CITY</th>
    <th id='password'>PASSWORD
    </th>
    <th id='update'>Update</th>
    <th class ='delete'>Delete</th>
        <!-- <th id='update'>UPDATE</th>
        <th id='DELETE'>DELETE</th> -->
    </tr>
 </table>

  

</body>
</html>
