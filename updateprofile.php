
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
if(isset($_POST['submit'])){
$name=$phone=$age=$gender=$email="";
              $uname =  $_SESSION["admin_name"];
              $name =  test_input($_POST["name"]);
              $phone =  test_input($_POST["phone"]);
              $age =  test_input($_POST["age"]);
              $gender =  test_input($_POST["gender"]);
              $email =  test_input($_POST["email"]);
    
              if(preg_match('/^[A-Za-z\s0-9\_]{1,}$/i',$uname) && preg_match('/^([\w-]+(\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,})\.([a-z]{2,}(\.[a-z]{2})?)$/i',$email) && preg_match('/^(0|91|\+91){0,1}[\-\s\.]{0,1}[7-9]{1}[0-9]{4}[-\s\.]{0,1}[0-9]{5}$/ ' ,$phone) && preg_match('/^[A-Za-z\s]{1,}$/i', $name) && preg_match('/^[0-9]{1,2}$/',$age) && preg_match('/^(male|female)$/ ',$gender) )
              {
              $sql = "update harshit_profile SET email='".$email."' , gender='".$gender."' , mobile='".$phone."' , name='".$name."' , age='".$age."'  where username='".$uname."';";
          if ($conn->query($sql) === TRUE) {
            alert("DATA UPLOADED");
            header('Location: login.php');
          }
          else{
          }
}
else
echo "Profile Not Updated Check Validations!!<a href='login.php'>Jump Back to the Main Page!</a>";
}}
else{
header('Location: login.php');
}
?>
<html>
<head>
<title>harshit</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="./updateprofile.js"></script>
<style>
body{
margin:0;
padding:0;
        background-color:#f1f1f1;
}
.box
{
width:700px;
padding:20px;
        background-color:#fff;
}
</style>
</head>
<body>
<fieldset>
<legend>UPDATE</legend>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="frmLogin" onsubmit="return checkform()">
<h3 align="center">Update Profile</h3><br />
<span id="key">Username: </span>
<input name="uname" type=text value="<?php echo $row['username']; ?>" id="uname" disabled>
<BR>
<span id="key">Name: </span>
<input name="name" type=text placeholder="Enter Your Name" onchange="nameval()" id="name" value="<?php echo $row['name'] ?>" required>
<span id="name-error" class="error"></span>
<BR>
<span id="key">Phone Number:</span>
<input type="text" name="phone" placeholder="Enter Your Mobile Number" onchange="phoneval()" required="yes" id="phone" value="<?php echo $row['mobile'] ?>" >
<span id="phone-error" class="error"></span>
<BR>
<span id="key">Age:</span>
<input name="age" type=text placeholder="Enter Your Age" onchange="ageval()" id="age" required  value="<?php echo $row['age'] ?>" >
<span id="age-error" class="error"></span>
<BR>
<span id="key">Gender:</span>
<input name="gender" onchange="genval()" type="radio" value="male" id="gender" value="male" <?php if($row['gender']=='male') echo 'checked'; ?>><span>MALE</span><input name="gender" type="radio" value="female" onchange="genval()" id="gender" value="female" <?php if($row['gender']=='female') echo 'checked'; ?>><span>FEMALE</span>
<span id="gender-error" class="error"></span>
<BR>
<span id="key">E-mail: </span>
<input name="email" type=text placeholder="Enter Your E-mail" onchange="eval()" id="email" required value="<?php echo $row['email'] ?>" >
<span id="email-error" class="error"></span>

<BR>
<input type="submit" value="UPDATE" name="submit">
</form>
<a href="login.php"><button>Go Back</button></a>
</fieldset>
<br />
</div>
</body>
</html>

