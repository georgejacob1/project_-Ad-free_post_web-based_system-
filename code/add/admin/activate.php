<?php
include '../db_con.php';
if($_GET['actid']){
  $id = $_GET['actid'];
  $act = "UPDATE `tbl_users` SET `user_status`='active' WHERE `user_id`='$id'";
  $act_run = mysqli_query($conn,$act);
  if($act_run){
    echo '<script>alert("Activated");</script>';
    echo '<script>window.location.href="index.php"</script>';
  }
}
?>