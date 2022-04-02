<?php
session_start();
error_reporting(1);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $stuid=$_POST['stuid'];
    $password=md5($_POST['password']);
$query=mysqli_query($bd, "SELECT * FROM students WHERE StudentID='$stuid' and password='$password'");
if(mysqli_num_rows($query)>0)
{
$num=mysqli_fetch_array($query);
$extra="my-profile.php";//
$_SESSION['login']=$_POST['stuid'];
$_SESSION['id']=$num['StudentID'];
$_SESSION['sname']=$num['studentName'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($bd, "insert into userlog(StudentID,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid Student ID or Password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Student Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <?php include('includes/header.php');?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="page-head-line">Please Enter Login Information </h4>
                </div>
            </div>
             <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label>Enter Student ID : </label>
                        <input type="text" name="stuid" class="form-control"  />

                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control"  />
                        <hr />
                        
                        <button type="submit" name="submit" class="btn btn-info">&nbsp;Log In </button>&nbsp;
                        
                </div>
            </div>
            </form>
            
            <a href="student_registration.php">Click to Register</a><br><br>  

        </div>
    </div>
 
    <?php include('includes/footer.php');?>
   
    <script src="assets/js/jquery-1.11.1.js"></script>

    <script src="assets/js/bootstrap.js"></script>
</body>
</html>