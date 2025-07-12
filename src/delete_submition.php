<?php 
require_once "dbconnect.php";
$new_id = $_GET['new_id'];
//echo $new_id;
$quere1 = "delete from submitform_1 where guid = '$new_id'";

$quere2 = "delete from submitform_2 where guid = '$new_id'";

$quere3 = "delete from submitform_3 where position = '$new_id'";

$quere4 = "delete from submitform_4 where guid = '$new_id'";

?>
<script type="text/javascript">
let deleteConfirmation = confirm("Are you sure you want to delete this?");
if (deleteConfirmation) {
  console.log("Deletion process initiated.");
  // Code to handle deletion
  <?php 
  $data1 = mysqli_query($connection,$quere1);
  $data2 = mysqli_query($connection,$quere2);
  $data3 = mysqli_query($connection,$quere3);
  $data4 = mysqli_query($connection,$quere4);
    ?>
  window.open("http://localhost/rbgi/src/profile.php","_self")
} else {
  console.log("Deletion aborted by user.");
  // Code to handle cancellation
  window.open("http://localhost/rbgi/src/profile.php","_self")
}
</script>
