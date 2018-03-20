<?php
include('connect.php');
if($conn->connect_error) {
  die("Connection failed :".$conn->connect_error);
}
$sql = "use first_year_db";

 if ($conn->query($sql) === TRUE) {
            echo "Connected again";

if($_SERVER("request method")=="post")
{
  $name = test_input($_POST["username"]);
  $pass_input = test_input($_POST["password"]);
}

function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
         }

$sql = "select * from harshit_passwords where username='$name'";
$result = $conn->query($sql);

if($result->num_rows > 0){
  if($row=mysqli_fetch_array($result)){
    $pass_db = $row['passkey'];
    if(!empty($_POST['login'])){
      $_SESSION["id"]=$row["id"];
      if(!empty($_POST["remember"])){
             setcookie("member_login",$name, time()+( 7*24 * 60 * 60));
             setcookie ("member_password",$pass_input,time()+ (7 * 24 * 60 * 60));
              } else{
                             if(isset($_COOKIE["member_login"])) {
               setcookie ("member_login","");
             }
             if(isset($_COOKIE["member_password"])) {
               setcookie ("member_password","");
             }
           }
         }
        }
    }

    if($pass_db=$pass_input)
    {
       echo('<script>alert("welocome to ur home page"</script>');
       $sql="sekect * from harshit_profile where username='$name'";
       $result = conn->query($sql);
      $row=mysqli_fetch_array($result);
      echo('Hi $row["name"]');
       

    }
?>
