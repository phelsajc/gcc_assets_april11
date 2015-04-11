<?php


include('conn.php');



         
         
            $item_name    = $_GET['item_name'];
            $id    = $_GET['item_idp'];

        /*    $item_serial    = $_GET['item_serial'];
            $item_model    = $_GET['item_model'];
            $item_qty    = $_GET['item_qty'];
            $item_price    = $_GET['item_price'];
            $item_dop    = $_GET['item_dop'];
            $item_employee    = $_GET['item_employee'];//ok
            $item_company    =$_GET['item_company'];//ok
            $item_remarks  = $_GET['item_remarks'];
            $item_description    = $_GET['item_description'];
            $item_category    = $_GET['item_category'];//ok*/
            


   $stmt = $pdo->prepare("UPDATE `items` SET `item_name`=? WHERE `item_id`=?");
   $stmt->execute(array($item_name,$id));

    print $stmt;



?>