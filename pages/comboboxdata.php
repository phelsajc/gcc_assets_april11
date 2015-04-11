<?php
#Include the connect.php file
  include('conn.php');
  $query = $pdo->prepare('select * from employee');
  $query->execute();

 while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $fname = $row['employee_fname'];
            $mname = $row['employee_mname'];
            $lname = $row['employee_lname'];
            $mid=substr($mname,0,1);
            $fullnames = $fname.' '.$mid.' '.$lname;  
            
        $employees[] = array(
            'allid' => $row['employee_id'],         
            'fullname' =>  $fullnames
           );
                
                }
            echo json_encode($employees); 

?>