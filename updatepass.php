<?php
session_start();
if(isset($_SESSION["admin_name"])){
  $user_name=$_SESSION["admin_name"]; }
  include('connect.php');
$sql = "Use first_year_db";
if ($conn->query($sql) === TRUE) {
}
if(isset($_POST["Update"]))
{
  if(!empty($user_name) && !empty($_POST["member_password"]) && !empty($_POST["new_member_password"]) && !empty($_POST["cnew_member_password"]) )
  { 
   $name = $user_name;
    $newpw = mysqli_real_escape_string($conn, $_POST["new_member_password"]);
    $cnewpw = mysqli_real_escape_string($conn, $_POST["cnew_member_password"]);
    $password = mysqli_real_escape_string($conn, $_POST["member_password"]);
    $sql = "Select * from harshit_passkeys where username = '" . $name . "' and passkey = '" . $password . "'";  
    $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_array($result);
    if($user)   
    {
     if($newpw===$cnewpw) 
     {
      
      $sql = "UPDATE harshit_passkeys SET passkey='".$cnewpw."' WHERE username='".$name."'";
      if ($conn->query($sql) === TRUE) {
         echo "<script>alert('Updated Successfully!!');</script>";
         header("Location: ./login.php");
      } 
     } 
     else
     {
       $message = "Password Doesn't Match!";
    } } 
    else  
    {
      $message = "Invalid Password";  
    }}
  else
  {
    $message = "All Fields Are required";
  }}
?>
<html>
<head>
<title>harshit</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>
body{
margin:0;
padding:0;
        background-color:#f1f1f1;
}

</style>
</head>
<body>
<div >
<form action="" method="post" id="frmLogin">
<h2 align="center">Update Password</h2>
<br>
<div style="color:red;"><?php if(isset($message)) { echo $message; } ?></div>
<div>
<label for="login">Username</label>
<input name="member_name" type="text" value="<?php if(isset($_SESSION["admin_name"])){ echo $_SESSION["admin_name"]; } ?>" disabled />
</div>
<div>
<label for="password">Old Password</label>
<input name="member_password" type="password" value="" />
</div>
<div>
<label for="password">New Password</label>
<input name="new_member_password" type="password" value="" />
</div>
<div>
<label for="password">Confirm New Password</label>
<input name="cnew_member_password" type="password" value="" />
</div>
<div>
<div><input type="submit" name="Update" value="Update" ></span></div>
</div>
</form>
<br />
</div>
</body>
</html>
