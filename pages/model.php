<?php

    class Model extends Connection {

           /* public function insert() {

           $STH = $this->DBH->prepare("INSERT INTO users (name) VALUES ('test5')");
           $STH->execute();
           
            }

            public function getUser() {
          
            $query = $this->DBH->prepare('select name from users');
            $query->execute();
                while($r = $query->fetch()){
                  echo '<br>'.$r['name'],'<br>';
                }
            }

            public function removeUser() {

                $test='test4';
                $query = $this->DBH->prepare('delete from users where name = :filmID');
                $query->bindParam(':filmID', $test, PDO::PARAM_INT);   
                $query->execute();

                
            }


            public function updateUser(){

                $name="nika g. lucasan";
                $id=23;
                $xid=2;
                $query = $this->DBH->prepare('update users set uid=:uid,name=:uname where uid=:xid');
                $query->bindParam(':uid', $id, PDO::PARAM_INT); 
                $query->bindParam(':xid', $xid, PDO::PARAM_INT); 
                $query->bindParam(':uname', $name, PDO::PARAM_STR); 
                $query->execute();
            }*/





            public function authentication($x){
                global $pass;
            
            $err = "Some error occured please try after some time ";
            $query = $this->DBH->prepare('select * from user_account where user_name=:uname and user_password=:pword');
            $query->execute(array(':uname' => $x['uname'], ':pword' => $x['pword']));
     

        


     if($row = $query->fetch())
                    {   


                        session_start();

    $_SESSION['xnamex']=$row['user_name'];
                $getlevel=$row['user_level'];
                $pass=$getlevel;

                        echo "ok ";
                                          
                     header("Location: ../style/inventory.html");          
            }

                    else{
        session_start();



        //echo "not ";
    $a="not ok";


     $GLOBALS['messages'] = $a;
                header("Location: ../index.php?id={$a}");   
    print "not ok";

                    
        //echo "Please Log In First";
                    

    /*echo "Please Log In First"; //working but not nice
    echo "<script>setTimeout(\"location.href = '../index.html';\",1500);</script>";*/
                    }   






            



            /*if($sess=$query->fetch()){

                            session_start();

                         //   $_SESSION['uid']=$sess->bscc_account_id;
                           // $_SESSION['uname']=$sess->bscc_account_user_name;
                          //  $_SESSION['pword']=$sess->bscc_account_id;
                              $_SESSION['level']=$sess->user_level;
                           //   $getlevel=$sess->user_level;


                            // $GLOBALS['z'] =  $GLOBALS['getlevel']; 
                            
                          // header("Location: ../view/main.php");         

                           //echo "ok";

                        }
                        else{
                            header("Location: ../index.<!DOCTYPE html>
                            <html>
                            <head>
                                <title></title>
                            </head>
                            <body>
                            
                            </body>
                            </html>");
                            echo "failed 2 ";   
                                
                        }*/

            }


    function showdata() {
       

        $query = $this->DBH->prepare('select * from employee');
         $query->execute();
                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $t= $row['employee_dob'];
        $formats12=date("m/d/Y", strtotime($t));

        $employees[] = array(
            'e_id' => $row['employee_id'],
            'e_fn' => $row['employee_fname'],
            'e_mn' => $row['employee_mname'],
            'e_ln' => $row['employee_lname'],
            'e_ag' => $row['employee_age'],         
            'e_gd' => $row['employee_gender'],
            'e_en' => $row['employee_id_number'],
            'e_po' => $row['employee_position'],
            'e_hnum' => $row['employee_house_num'],
            'e_st' => $row['employee_street'],
            'e_sb' => $row['employee_subd'],
            'e_bl' => $row['employee_block'],
            'e_lnum' => $row['employee_lot_num'],
            'e_by' => $row['employee_brgy'],
            'e_ct' => $row['employee_country'],
            'e_pl' => $row['employee_postal'],
            'e_un' => $row['username'],
            'e_pw' => $row['password'],
            'e_al' => $row['employee_access_level'],
            'e_db' => $formats12


          );
                
                }
            echo json_encode($employees);

                //  $GLOBALS['level'] = $GLOBALS['x'] + $GLOBALS['y'];
    }

            public function insert_employee($a){

            $e_fn     = $_GET['e_fn'];
            $e_mn    = $_GET['e_mn'];
            $e_ln    = $_GET['e_ln'];
            $e_ag    = $_GET['e_ag'];
            $e_db    = $_GET['e_db'];
            $e_gd    = $_GET['e_gd'];
            $e_en    = $_GET['e_en'];
            $e_po    = $_GET['e_po'];
            $e_hnum    = $_GET['e_hnum'];
            $e_st    = $_GET['e_st'];
            $e_sb    = $_GET['e_sb'];
            $e_bl    = $_GET['e_bl'];
            $e_lnum    = $_GET['e_lnum'];
            $e_by    = $_GET['e_by'];
            $e_ct    = $_GET['e_ct'];
            $e_pl    = $_GET['e_pl'];
            $e_un    = $_GET['e_un'];
            $e_pw    = $_GET['e_pw'];
            $e_al    = $_GET['e_al'];
              
            $stmt = $this->DBH->prepare("INSERT INTO `employee` VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array('', $e_fn,$e_mn,$e_ln,$e_ag,$e_db,$e_gd,$e_en,$e_po,$e_hnum,$e_st,$e_sb,$e_bl,$e_lnum,$e_by,$e_ct,$e_pl,$e_un,$e_pw,$e_al));
            echo $stmt;
            //header ('Location: main.php');
            }


            public function updateUser($a){

              
                $query = $this->DBH->prepare('update users set name=:uname where uid=:xid');
                $query->bindParam(':uid', $id, PDO::PARAM_INT); 
                $query->bindParam(':xid', $xid, PDO::PARAM_INT); 
                $query->bindParam(':uname', $name, PDO::PARAM_STR); 
                $query->execute();


        $stmt = $pdo->prepare("UPDATE `employee` SET `fname`=?,`mname`=?,`lname`=?,`bc_contact`=?,`bc_tin`=? WHERE `bc_id`=?");
        $stmt->execute(array($bac_id,$bc_creditor,$bc_address,$bc_contact,$bc_tin,$bc_id));

            }

































            public function showmain(){


            $query = $this->DBH->prepare('select * from comnpany');
            $query->execute();


        $list = array();

        while($r = $query->fetch(PDO::FETCH_ASSOC)){
               $list[] = $r;
        }




         $options = array();
      $options[] = '<option value="">--?--</option>';
      foreach ( $list as $v ) {
            
            $company_name=$v['company_name'];
            $company_id=$v['company_id'];


       $options[] = "<option value='$company_id'>$company_name</option>";
      }



    print "<form method='post' action='../connector/controller.php'>
    <fieldset>
    <legend>Add an item</legend>
    <table>
    <tr>
        <td>Serial</td>
        <td><input type='text'  name='serial' required></td>
    </tr>

    <tr>
        <td>Brand</td>
        <td><input type='text'  name='brand' required></td>
    </tr>

    <tr>
        <td>Model</td>
        <td><input type='text'  name='model' required></td>
    </tr>

    <tr>
        <td>Date Purchase</td>
        <td><input type='text'  name='date_purchase' required></td>
    </tr>

    <tr>
        <td>Price</td>
        <td><input type='text'  name='price' required></td>
    </tr>

    <tr>
        <td>Image</td>
        <td><input type='text'  name='image' required></td>
    </tr>

    <tr>
        <td>Location</td>
        <td><input type='text'  name='location' required></td>
    </tr>

    <tr>
        <td>Number of items</td>
        <td><input type='text'  name='number_of_items' required></td>
    </tr>

    <tr>
        <td>Supplier</td>
        <td><input type='text'  name='substr(string, start)pplier' required></td>
    </tr>

    <tr>
        <td></td>
        <td>";
     
      // echo "<div style='clear:both;' >";
      //echo "<label class='cf_label' style='width: 150px;'></label>";
      echo "<select class='validate[\"required\"]'  >";
      echo implode("\n", $options);
      echo '</select></div>';
    print"</td>
    </tr>
    </table>
    </fieldset>
    <input type='submit' name='submit' value='Submit'> 
    </form>";


            }




            
    function createRangeSelect($label, $name, $start, $end) {
      $options = array();
      $options[] = '<option value="">--?--</option>';
      foreach ( range($start, $end) as $v ) {
        $options[] = "<option value='$v'>$v</option>";
      }
      echo "<div style='clear:both;' >";
      echo "<label class='cf_label' style='width: 150px;'>{$label}</label>";
      echo "<select class='validate[\"required\"]' id='{$name}' size='1' name='{$name}' >";
      echo implode("\n", $options);
      echo '</select></div>';
    }



            
    function ok(){

    echo "connected";

    }

    }

    ?>