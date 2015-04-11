<?php
#Include the connect.php file
  include('conn.php');
  $query = $pdo->prepare('select * from category');
  $query->execute();

 while($row = $query->fetch(PDO::FETCH_ASSOC)){

            
        $cat[] = array(
            'catid' => $row['category_id'],         
            'catname' =>  $row['category_name']
          );
                
                }
            echo json_encode($cat); 

?>