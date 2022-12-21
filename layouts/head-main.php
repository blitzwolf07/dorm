<?php
// include language configuration file based on selected language
$lang = "en";
if (isset($_GET['lang'])) {
   $lang = $_GET['lang'];
   $_SESSION['lang'] = $lang;
}
if( isset( $_SESSION['lang'] ) ) {
    $lang = $_SESSION['lang'];
}else {
    $lang = "en";
}
require_once ("./assets/lang/" . $lang . ".php");
        
?>


<?php include 'include/session.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
    <?php 
        $users = mysqli_query($conn,"select * from tbl_users where id = '$user_id'") or die (mysqli_error($conn));
        $user = mysqli_fetch_assoc($users);

        $fullname = $user['full_name'];
        $status = $user['status'];
        $dorm_id = $user['dorm_id'];
    ?>