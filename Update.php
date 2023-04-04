<?php
session_start();
if (isset($_SESSION['loggedin'])) 
{
  include('connection.php');
  $logid = $_SESSION['loggedin'];
  $res = mysqli_query($con, "select * from manage where id='$logid'");
  $row = mysqli_fetch_assoc($res);

  $gid = $_REQUEST['update'];
  $memm = mysqli_query($con, "select * from vehicle where id='$gid'");
  $brow = mysqli_fetch_assoc($memm);

  if (isset($_POST['save'])) {

 	  $name=$_POST['name'];
 	  $description=$_POST['description'];
	  $price=$_POST['price'];
	  $model=$_POST['model'];
    $quantity=$_POST['quantity'];
 
    $sql = "update vehicle set name='$name',description='$description',price='$price',model='$model',quantity='$quantity' where id='$gid'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_affected_rows($con) == 1) 
    {
        echo '<script>alert("Updated");</script>';
        header("location:Dashboard.php");
    } 
    
    else {
      echo "<script>alert('sorry! unable to Update');</script>";
    }
  }

  if (isset($_POST['saveimg'])) {
    $rand=(rand(111111,999999));
    $imgname = $rand.$_FILES['file']['name'];

    $sql = "update vehicle set image='$imgname'  where id='$gid'";
    $result = mysqli_query($con, $sql);
     if (move_uploaded_file($_FILES['file']['tmp_name'], 'images/vehicle/' .$imgname))

      if (mysqli_affected_rows($con) == 1) {
        header("location:Dashboard.php");
      } 
      
      else {
        echo "<script>alert('sorry! unable to Update');</script>";
      }
  }
?>
 
 <!DOCTYPE html>
<html>
<title>Dasboard</title>
<body>
    <?php require_once('header.php'); ?>
      
    <h2 class="heading"><b>Add Vehicle</b></h2>
     <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Update Infomation</h4>
                <form method="POST" enctype="multipart/form-data">
                 
                <br><lavel>Name:</lavel>
                <input value="<?php echo $brow['name'];?>" type="text" name="name" class="form-control" required>

                <br><lavel>Description:</lavel>
                <textarea type="text" name="description" class="form-control" required> <?php echo $brow['description'];?></textarea>

                <br><lavel>Price:</lavel>
                <input value="<?php echo $brow['price'];?>" type="text"  onkeypress="return validateNumber(event)" name="price" class="form-control" required>

                <br><lavel>Model:</lavel>
                <input value="<?php echo $brow['model'];?>" type="text" name="model" class="form-control" required>

                <br><lavel>Quantity:</lavel>
                <input value="<?php echo $brow['model'];?>" type="text" name="quantity" class="form-control" required>
                
                <br>
                <button class="btn btn-primary" type="submit" name="save">Update</button> 
                </form>
             </div>

              <div class="col-sm-4">
                <h4>Update Image</h4>
                <form method="POST" enctype="multipart/form-data">
                <br><lavel>Image:</lavel>
                <input type="file" name="file" accept="image/*" class="form-control" required>
                <br>
                <button class="btn btn-primary" type="submit" name="saveimg">Update</button> 
                </form>
             </div>


             <div class="col-sm-2">
                <marquee direction="down" scrollamount="2"><img src="images/vehicle/<?php echo $brow['image'];?>" style="height:40%;width:100%"></marquee>
             </div>

       </div>
    </div>
     <?php require_once('footer.php'); ?>
   </body>

</html>
<?php
} else {
  header("location:Login");
}
?>