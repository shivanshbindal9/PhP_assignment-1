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
if($row['username']=='NULL' || $row['email']=='NULL' || $row['gender']=='NULL' || $row['mobile']=='NULL' || $row['name']=='NULL' || $row['age']==0)
{
alert("Please Update Your Data To see Common Feed");
header('Location: updateprofile.php');
}
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
}
else{
header('Location: login.php');
}

?>
<html>
<head>
<title>harshit</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>

</style>
</head>
<body>
<a href="login.php"><button>Go Back</button></a>
<center>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="frm">
<h5 align="center">Update Post</h5><br />
<input name="uname" type=text value="<?php echo $row['username']; ?>" id="uname" disabled>
<BR>
<textarea name="content" placeholder="Write Something Here..." form="frm" required></textarea>
<BR>
<input type="submit" value="UPDATE" name="submit">
</form>
<center>
<br >
</div>
<?php
$sql = "SELECT *  FROM harshit_post order by id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
                echo "hey " . $row["username"]. "<br>" . $row["date"]. "<br> " . $row["content"]. "<br>";
                    }
} else {
      echo "No Post Available";
}
?>
</body>
</html>
