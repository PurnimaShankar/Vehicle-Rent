<?php
require_once('connection.php');
if (isset($_POST['save'])) {
    $rand = (rand(111111, 999999));
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $model = $_POST['model'];
    $imagee = $rand . $_FILES['image']['name'];
    $quantity = $_POST['quantity'];


    $sql = "insert into vehicle (name,description,price,model,image,quantity)
         values('$name','$description','$price','$model','$imagee','$quantity')";

    $image =  $rand . $_FILES['image']['name'];
    if (move_uploaded_file($_FILES['image']['tmp_name'], 'images/vehicle/' . $image))

        $result = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Success..');</script>";
        header("location:Dashboard.php");
    } else {
        echo "<script>alert('Try Again..');</script>";
    }
}
$result=mysqli_query($con,"SELECT count(*) as vid from booking where vid<>'0'");
$booking=mysqli_fetch_assoc($result);

$result=mysqli_query($con,"SELECT count(*) as id from vehicle");
$vehicle=mysqli_fetch_assoc($result);

 $t = $vehicle['id'] - $booking['vid'];


?>

<!DOCTYPE html>
<html>
<title>Dasboard</title>

<body>
    <?php require_once('header.php'); ?>
 
    <h2 class="heading"><b>Add Vehicle</b></h2>
     
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="overflow-x:auto;">
                <h4>Your Booking Data:</h4>
                <table class="table">
                    <tr>
                        <th>Sr No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Model</th>
                      </tr>
                    <?php
                    include('connection.php');
                    $id=$_GET['name'];
                    $sql = "select * from booking where email='$id'   order by id desc";
                    $result11 = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result11)) {

                        $i = 1;
                        while ($rows11 = mysqli_fetch_assoc($result11)) {
                         $idd = $rows11['vid'];
 

                        $sqll = "select * from vehicle where id='$idd'  order by id desc";
                        $result111 = mysqli_query($con, $sqll);

                        if (mysqli_num_rows($result111)) {

                        $ii = 1;
                        while ($rows12 = mysqli_fetch_assoc($result111)) {


                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><img style="height:100px;width:100px" src="images/vehicle/<?php echo $rows12['image']; ?>"></td>
                                <td><?php echo $rows12['name']; ?></td>
                                <td><?php echo $rows12['description']; ?></td>
                                <td><?php echo $rows12['price']; ?></td>
                                <td><?php echo $rows12['model']; ?></td>
                                 
                            </tr>
                            <?php
                      $i++;
                    } } }
                    ?>

                  <?php
                  } else {
                  ?>
                    <div style=" padding:15px; margin-top:10px;">

                      <h4 style="text-align:center;color:red;"><b>Sorry ! No result found..!</b></h4>
                    </div>
                  <?php
                  }
                  ?>
                </table>

            </div>
        </div>
    </div>
     <?php require_once('footer.php'); ?>
</body>

</html>