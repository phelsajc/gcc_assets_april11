<?php
#Include the connect.php file
  include('conn.php');
  $query = $pdo->prepare('select * from company');
  $query->execute();

 while($row = $query->fetch(PDO::FETCH_ASSOC)){
    
        $company[] = array(
            'cid' => $row['company_id'],         
            'cname' =>  $row['company_name']

          );
     }
            echo json_encode($company); 

?>