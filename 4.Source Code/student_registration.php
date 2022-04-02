<?php
session_start();
error_reporting(1);
include("includes/config.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //Something was posted
    $studentName = $_POST['studentName'];
    $StudentID = $_POST['StudentID'];
    $password = md5($_POST['password']);
    $pincode = $_POST['pincode'];

    //Save to Database
    $query = "insert into students (studentName, StudentID, password, pincode) values ('$studentName','$StudentID','$password','$pincode')";
   
    mysqli_query($bd, $query);

    header("Location: index.php");
    die;
}

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student Registration</title>
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
                      <h1 class="page-head-line">Student Registration  </h1>
                  </div>
              </div>
              <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
              <form name="admin" method="post">  
              <div class="row" >
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Student Registration
                        </div>
                        <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>

                        <div class="panel-body">
                       <form name="dept" method="post">
<div class="form-group">
    <label for="studentName">Student Name</label>
    <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Student Name" required />
</div>

 <div class="form-group">
    <label for="StudentID">Student ID #</label>
    <input type="text" class="form-control" id="StudentID" name="StudentID" placeholder="Student ID #" required />
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required />
</div>   

<div class="form-group">
    <label for="text">Pincode</label>
    <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter pincode" required />
</div> 

 <button type="submit" name="submit" id="submit" class="btn btn-default">Submit</button>

</form>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>

</body>
</html>
<?php  ?>