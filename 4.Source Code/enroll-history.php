<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{
    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($bd, $_POST['id_to_delete']);
        $sql = "DELETE FROM courseenrolls WHERE id = $id_to_delete";

        if(mysqli_query($bd, $sql)){
            //Success
            header('Location: enroll-history.php');
        } {
            //Failure
            echo 'query error: ' . mysqli_error($bd);
        }
    }
    // check GET request id parameters
    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($bd, $_GET['id']);

        // make sql
        $sql = "SELECT * FROM courseenrolls WHERE id = $id";

        // get query results
        $result = mysqli_query($bd, $sql);

        // fetch result in array format
        $disenroll = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Enroll History</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<?php include('includes/header.php');?>
  
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Enrollment History  </h1>
                    </div>
              </div>
        <div class="row" >
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Enrollment History
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
                                        <th>Enrollment Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$sql=mysqli_query($bd, "SELECT * FROM courseenrolls");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
    <tr align="left">
        <td><?php echo $cnt;?></td>
        <td><?php echo htmlentities($row['courseName']);?></td>
        <td><?php echo htmlentities($row['enrollDate']);?></td>
        <td>

        <!-- DELETE FORM -->
        <form action="enroll-history.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $disenroll['id'] ?>">
            <input type="submit" name="delete" value="Disenroll">
        </form>

        </td>
    </tr>
<?php 
$cnt++;
} ?>      
                                    </tbody>
                                </table>
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
<?php } ?>