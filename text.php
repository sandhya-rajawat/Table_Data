function  search_pagination(){
   echo __LINE__;
   $obj=new DataConnect();
   $con=$obj->connect(); 
   $results_per_page = 10; 
if (isset($_POST['submit'])) {
  
      $search = mysqli_real_escape_string($con, $_POST['search']);
      $sql = "SELECT * FROM UserInfo WHERE name LIKE '%$search%' ";
      
      $result = mysqli_query ($con, $sql);
      $queryResult = mysqli_num_rows($result);
      $number_of_pages = ceil($queryResult / $results_per_page); 
  
      echo " ".$queryResult." RESULTS";
  
      if ($queryResult > 0){
          while ($row = mysqli_fetch_assoc($result)){
              echo "<div>
      <h3>".$row['id']."</h3>
      <p>".$row['name']."</p>
      <p>".$row['city']."</p>
      <p>".$row['password ']."</p>
      </div>";
          }       
      }   
  }
  
}
echo "<div>
      <h3>".$row['id']."</h3>
      <p>".$row['name']."</p>
      <p>".$row['city']."</p>
      <p>".$row['password ']."</p>
      </div>";