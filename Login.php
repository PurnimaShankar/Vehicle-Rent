<?php
include('connection.php');
session_start();
if (isset($_POST['signin'])) {
	$user = mysqli_real_escape_string($con, $_POST['user']);
	$password =  mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "select * from manage  where user='$user' and password='$password'");
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);

		$_SESSION['loggedin'] = $row['id'];
		header("Location:Dashboard.php");
	} 
    
     else {
		echo "<script>alert('wrong credentials');</script>";
	}
}

if(isset($_SESSION['loggedin']))
{ //if login in session is not set
    header("Location: Dashboard.php");
}

else{
    
}
?>

<!DOCTYPE html>
<html lang="en">
<title>Login</title>

<body>
    <?php require_once('header.php'); ?>
    <h2 class="heading"><b>Login</b></h2>
    <div class="container">
        <div class="row">

            <div class="col-sm-4"></div>
            <div class="col-sm-4 ">
                <!-- <h4>Fill All Required Field</h4> -->
                <br>
                <form method="POST">
                    <lavel>Username</lavel>
                    <input type="text" name="user" class="form-control" required>

                    <lavel>Password</lavel>
                    <input type="password" name="password" class="form-control" required>

                    <br>
                    <button class="btn btn-primary" type="submit" name="signin">Submit</button>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
     <?php require_once('footer.php'); ?>
</body>

</html>
 