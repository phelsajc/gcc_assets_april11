<?PHP
#Include the connect.php file
include('conn.php');

$query = $pdo->prepare('select * from employee');
$query->execute();
            
if (isset($_GET['insert']))
{
  			$e_fn    = $_GET['e_fn'];
            $e_mn    = $_GET['e_mn'];
            $e_ln    = $_GET['e_ln'];
            $e_ag    = $_GET['e_ag'];
            $e_db    = $_GET['e_db'];
            $e_gd    = $_GET['e_gd'];
            $e_en    = $_GET['e_en'];
            $e_po    = $_GET['e_po'];
            $e_hnum  = $_GET['e_hnum'];
            $e_st    = $_GET['e_st'];
            $e_sb    = $_GET['e_sb'];
            $e_bl    = $_GET['e_bl'];
            $e_lnum  = $_GET['e_lnum'];
            $e_by    = $_GET['e_by'];
            $e_ct    = $_GET['e_ct'];
            $e_pl    = $_GET['e_pl'];
            $e_un    = $_GET['e_un'];
            $e_pw    = $_GET['e_pw'];
            $e_al    = $_GET['e_al'];

	 $stmt = $pdo->prepare("INSERT INTO `employee` VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
     $res=$stmt->execute(array('', $e_fn,$e_mn,$e_ln,$e_ag,$e_db,$e_gd,$e_en,$e_po,$e_hnum,$e_st,$e_sb,$e_bl,$e_lnum,$e_by,$e_ct,$e_pl,$e_un,$e_pw,$e_al));
     
     $idp = $pdo->lastInsertId();
	$passid['e_idp'] = $idp;

	print json_encode($passid);
}
else if (isset($_GET['update']))
{


            $e_fn    = $_GET['e_fn'];
            $e_mn    = $_GET['e_mn'];
            $e_ln    = $_GET['e_ln'];
            $e_ag    = $_GET['e_ag'];
            $e_db    = $_GET['e_db'];
            $e_gd    = $_GET['e_gd'];
            $e_en    = $_GET['e_en'];
            $e_po    = $_GET['e_po'];
            $e_hnum  = $_GET['e_hnum'];
            $e_st    = $_GET['e_st'];
            $e_sb    = $_GET['e_sb'];
            $e_bl    = $_GET['e_bl'];
            $e_lnum  = $_GET['e_lnum'];
            $e_by    = $_GET['e_by'];
            $e_ct    = $_GET['e_ct'];
            $e_pl    = $_GET['e_pl'];
            $e_un    = $_GET['e_un'];
            $e_pw    = $_GET['e_pw'];
            $e_al    = $_GET['e_al'];
            $e_id    = $_GET['e_id'];


   $stmt = $pdo->prepare("UPDATE `employee` SET `employee_fname`=?,`employee_mname`=?,`employee_lname`=?,`employee_age`=?,`employee_dob`=? ,`employee_gender`=?,`employee_id_number`=?,`employee_position`=?,`employee_house_num`=?
    ,`employee_street`=?,`employee_subd`=?,`employee_block`=? ,`employee_lot_num`=? ,`employee_brgy`=? ,`employee_country`=? ,`employee_postal`=? ,`username`=? 
    ,`password`=? ,`employee_access_level`=? WHERE `employee_id`=?");
   $stmt->execute(array($e_fn,$e_mn,$e_ln,$e_ag,$e_db,$e_gd,$e_en,$e_po,$e_hnum,$e_st,$e_sb,$e_bl,$e_lnum,$e_by,$e_ct,$e_pl,$e_un,$e_pw,$e_al,$e_id));

    print $stmt;

}
else if (isset($_GET['delete']))
{
            $id= $_GET['e_id'];       
            $query = $pdo->exec("DELETE FROM `employee` WHERE `employee_id` IN($id)");
            print $query;
}
else{

    // SELECT COMMAND
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
}
?>