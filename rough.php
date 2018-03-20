<?php 
function alert($obj){
echo "<script>alert('".$obj."')</script>";
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
         }
session_start();
if(isset($_SESSION["admin_name"]))
{
$uname=$_SESSION["admin_name"];
include("connect.php");
$sql="use first_year_db";
if($conn->query($sql) === TRUE){}
$sql = "SELECT *  FROM harshit_profile where username='".$uname."'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc()) { }
if($row['username']=='NULL' || $row['email']=='NULL' || $row['gender']=='NULL' || $row['mobile']=='NULL' || $row['name']=='NULL' || $row['age']=='NULL')
{
alert("Please Update Your Data To see Common Feed");
header('Location: updateprofile.php');
}
else
{
if(isset($_POST['submit'])){
$name=$uname="";
              $uname =  $_SESSION["admin_name"];
              $content =  test_input($_POST["content"]);
              $date = date("H:i:s, d-M-Y");
  $sql = "insert into harshit_post(username, content, date) values('".$uname."','".$content."','".$date."');";
          if ($conn->query($sql) === TRUE) {
          }
          else{
          }



}

else{
header('Location: home.php');
}
}
?>
<html>
<head>
<title>harshit</title>
