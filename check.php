<?php 
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["username"])) {
    $result = mysql_query("SELECT count(*) FROM harshit_profile WHERE username='" . $_POST["username"] . "'");
      $row = mysql_fetch_row($result);
        $user_count = $row[0];
          if($user_count>0) echo "<span class='status-not-available'> Username Not Available.</span><script>a=0; console.log(a)</script>";
            else echo "<span class='status-available'> Username Available.</span><script>a=1; console.log(a)</script>";
}
?>
