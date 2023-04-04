<?php
require_once('connection.php');
$id = $_GET['i'];
$res = mysqli_query($con, "select * from vehicle where id='$id'");
$row = mysqli_fetch_assoc($res);

$vid = $row['id'];
 
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $from = $_POST['from'];
    $to = $_POST['to'];

      $sql = "insert into booking (name,email,phone,address,vid,fromm,too)
         values('$name','$email','$phone','$address','$vid','$from','$to')";

  
        $result = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
       
        echo "<script>alert('Success..');</script>";
        header("location:index.php");
    } 
    
    else {
        echo "<script>alert('Try Again..');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Vehicle-Details</title>
<body>
<div class="container">
   
   <div class="modal fade" id="myModal" role="dialog">
     <div class="modal-dialog">
     
       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
         <h4 class="modal-title">Fill Information</h4>
      </div>
      <div class="modal-body">
        <form method="POST">
        <label>Enter Name</label>
        <input type="text" name="name" class="form-control">

        <label>Enter Email</label>
        <input type="text" name="email" class="form-control">

        <label>Enter Phone</label>
        <input type="text" name="phone" class="form-control">

        <label>From</label>
        <input type="datetime-local" name="from" class="form-control">

        <label>To</label>
        <input type="datetime-local"  class="form-control" type="text" name="to">

        <label>Address</label>
        <textarea  class="form-control" type="text" name="address"></textarea>
        <br><button class="btn btn-primary" type="submit" name="save">Book</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
</form>
      </div>
       
       </div>
     </div>
     
   </div>
<?php require_once('header.php'); ?>

    <h2 class="heading"><b>Vehicle-Details</b></h2>
 
    <div class="container">
        <div class="row">
           
        <div class="col-sm-6">
                <img class="aboutimg" src="images/vehicle/<?php echo $row['image'];?>">
            </div>


            <div class="col-sm-6">
                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half"></i>
                <h6>Name: <?php echo $row['name'];?></h6>
                <h6>Price: $<?php echo $row['price'];?></h6>
                <h6>Model: <?php echo $row['model'];?></h6>
                <p><?php echo $row['description'];?></p>
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Book Now</button>
            </div>
      </div>
    </div>
     <?php require_once('footer.php'); ?>
   </body>

</html>