<?php
ob_start();

include('config.php');

if(!empty($_SESSION['msg'])){
  $msg= $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
  
<?php
if(isset($_POST['Update'])){
  // Checking for Empty Fields
  $user_id =mysqli_real_escape_string ($conn,  $_POST['id']);
   $status=mysqli_real_escape_string ($conn, $_POST['status']);
  
   
    $sql = "UPDATE admin_page SET status = '$status' WHERE id =$user_id";
 
 
  if($conn->query($sql) == TRUE){
   // below msg display on form submit success
   $_SESSION['msg'] = '<div> Updated Successfully </div>';
//    echo $user_id ;
//    echo $status;
   header("Location:admin_page.php");
  } else {
   // below msg display on form submit failed
   $_SESSION['msg'] = '<div> Unable to Update </div>';
   header("location:update_status.php");
  }
}
  
  

 ?>
<?php
  if(isset($_POST['edit'])){
      $sql = "SELECT * FROM admin_page WHERE id = {$_POST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    
   
  }
 ?>

<main>
    <div>
    <h1>edit id number of <?php if(isset($row['id'])) {echo $row['id']; }?></h1>
    <hr>
    <form action="" method="post" enctype='multipart/form-data'>

                <input type="hidden" id="id" name="id"   value="<?php if(isset($row['id'])) {echo $row['id']; }?>">
                <select name="status" id="status">
                  <option value="">choose status</option>  
                  <option value="1">active</option>  
                  <option value="0">inactive</option>  
                </select>
          
            <div class="col-12">
              <button type="submit" class="btn btn-primary" id="Update" name="Update">Update</button>
            </div>
            <?php if(isset($msg)) {echo $msg; } ?>
      </form>
    </div>
</main>

