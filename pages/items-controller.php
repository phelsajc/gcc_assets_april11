<?PHP
#Include the connect.php file
include('conn.php');
//error_reporting(0);
$query = $pdo->prepare('select items.item_id,items.item_name,items.item_serial,items.item_model,items.item_dop,items.item_remarks,items.item_price,items.item_image,items.item_description,category.category_name,items.item_qty,company.company_name,company.company_id,employee.employee_fname,employee.employee_id from items left join company on items.company_id=company.company_id left join employee on items.employee_id=employee.employee_id left join category on items.category_id=category.category_id');
$query->execute();  


              /*$target_dir = "photos/";
$target_file = $target_dir . basename($_GET["item_image"]["name"]);
$images=move_uploaded_file($_GET["item_image"]["tmp_name"], $target_file);*/
      // $name = $_FILES['vasPhoto_uploads']['name'];
    //  $size = $_FILES['vasPhoto_uploads']['size'];
if (isset($_POST['insert'])){
            $item_name    = $_POST['item_name'];
            $item_serial    = $_POST['item_serial'];
            $item_model    = $_POST['item_model'];
            $item_qty    = $_POST['item_qty'];
            $item_price    = $_POST['item_price'];
            $item_dop    = $_POST['item_dop'];
            $item_employee    = $_POST['item_employee'];//ok
            $item_company    =$_POST['item_company'];//ok
            $item_remarks  = $_POST['item_remarks'];
            $item_description    = $_POST['item_description'];
            $item_category    = $_POST['item_category'];//ok

          /*  $file=$_FILES['image']['tmp_name'];
            $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name= addslashes($_FILES['image']['name']);*/
            move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
            $images="photos/" . $_FILES["image"]["name"];


            /*$file=$_FILES['item_image']['tmp_name'];
            $image= addslashes(file_get_contents($_FILES['item_image']['tmp_name']));
            $image_name= addslashes($_FILES['item_image']['name']);
            move_uploaded_file($_FILES["item_image"]["tmp_name"],"photos/" . $_FILES["item_image"]["name"]);
            $images="photos/" . $_FILES["item_image"]["name"];*/




           $stmt = $pdo->prepare("INSERT INTO `items` VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
           $res=$stmt->execute(array('',$item_name,$item_serial,$item_model , $item_qty,$item_dop ,$item_employee,$item_company,$item_remarks ,$item_description,$images,'', $item_category,$item_price));

           $itemdp = $pdo->lastInsertId();
              $passiditem['item_idp'] = $itemdp;  

              print json_encode($passiditem);

              header("location: main.php");

            }

else if (isset($_POST['update']))
{


         
            $item_name    = $_POST['item_name'];
            $item_serial    = $_POST['item_serial'];
            $item_model    = $_POST['item_model'];
            $item_qty    = $_POST['item_qty'];
            $item_price    = $_POST['item_price'];
            $item_dop    = $_POST['item_dop'];
            $item_employee    = $_POST['item_employee'];//ok
            $item_company    =$_POST['item_company'];//ok
            $item_remarks  = $_POST['item_remarks'];
            $item_description    = $_POST['item_description'];
            $id = $_POST['item_id'];
            $item_category    = $_POST['item_category'];//ok
            move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
            $images="photos/" . $_FILES["image"]["name"];
        /*  $item_serial    = $_GET['item_serial'];
            $item_model    = $_GET['item_model'];
            $item_qty    = $_GET['item_qty'];
            $item_price    = $_GET['item_price'];
            $item_dop    = $_GET['item_dop'];
            $item_employee    = $_GET['item_employee'];//ok
            $item_company    =$_GET['item_company'];//ok
            $item_remarks  = $_GET['item_remarks'];
            $item_description    = $_GET['item_description'];
            $item_category    = $_GET['item_category'];//ok*/
            


   $stmt = $pdo->prepare("UPDATE `items` SET `item_name`=?,`item_serial`=?,`item_model`=?,`item_qty`=? ,
    `item_price`=? ,`item_dop`=? ,`employee_id`=? ,`company_id`=?,`category_id`=?,`item_remarks`=?,`item_description`=?,`item_image`=? WHERE `item_id`=?");
   $stmt->execute(array($item_name,$item_serial,$item_model,$item_qty,$item_price,$item_dop,$item_employee,$item_company,$item_category,$item_remarks,$item_description,$images,$id));

    //echo $stmt;

        header("location: main.php");

}

            else{

      while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $t= $row['item_dop'];
        $formats12=date("m/d/Y", strtotime($t));

        $items[] = array(
         
            'i_id' => $row['item_id'],
            'i_name' => $row['item_name'],
            'i_serial' => $row['item_serial'],
            'i_model' => $row['item_model'],
            'i_qty' => $row['item_qty'],        
            'i_dob' => $formats12,
            'ee_name' => $row['employee_fname'],
            'ee_id' => $row['employee_id'],
            'i_remarks' => $row['item_remarks'],
            'i_item_description' => $row['item_description'],            
            'ca_name' => $row['category_name'],
            'co_name' => $row['company_name'],
            'co_id' => $row['company_id'],
           'i_image' => $row['item_image'],  
            'i_price' => $row['item_price']


          );
                
                }
            echo json_encode($items); 
          }
              

?>