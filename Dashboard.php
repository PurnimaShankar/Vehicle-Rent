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

$result=mysqli_query($con,"SELECT sum(quantity) from vehicle");
$vehicle=mysqli_fetch_assoc($result);


$result = mysqli_query($con, 'SELECT SUM(quantity) AS id FROM vehicle'); 
$row = mysqli_fetch_assoc($result); 
 $sum = $row['id'];
 $t = $sum - $booking['vid'];


?>

<!DOCTYPE html>
<html>
<title>Dasboard</title>

<body>
    <?php require_once('header.php'); ?>
<br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            <a href="Booking-List.php"><button class="btn btn-default"><i class="fa fa-list fafa"></i> Total Booking : <?php echo $booking['vid'];?></button></a>
            </div>

            <div class="col-sm-4">
                <button class="btn btn-default"><i class="fa fa-car fafa"></i>  Available Vehicle : <?php echo (abs($t));?></button>
            </div>

            <div class="col-sm-4">
                <button class="btn btn-default"><i class="fa fa-motorcycle fafa"></i> <i class="fa fa-car fafa"></i> Total Vehicle : <?php echo $sum ;?></button>
            </div>
 
        </div>
    </div>

    <h2 class="heading"><b>Add Vehicle</b></h2>
    <a href="Logout.php">
        <p style="text-align:right;padding-right:175px"><span class="badge badge-danger">Logout</span></p>
    </a>
 
    <div class="container">
        <div class="row">

            <div class="col-sm-4">
               <h4>Add Infomation</h4>
                <form method="POST" enctype="multipart/form-data">
                    <lavel>Image:</lavel>
                    <input type="file" name="image" accept="image/*" class="form-control" required>

                    <lavel>Name:</lavel>
                    <input type="text" name="name" class="form-control" required>

                    <lavel>Description:</lavel>
                    <textarea type="text" name="description" class="form-control" required></textarea>

                    <lavel>Price:</lavel>
                    <input type="text" onkeypress="return validateNumber(event)" name="price" class="form-control" required>

                    <lavel>Model:</lavel>
                    <input type="text" name="model" class="form-control" required>

                    <lavel>Quantity:</lavel>
                    <input type="number" name="quantity" class="form-control" required>

                    <br>
                    <button class="btn btn-primary" type="submit" name="save">Submit</button>
                </form>
            </div>

            <div class="col-sm-8" style="overflow-x:auto;">
                <h4>Vehicle Data:</h4>
                <table class="table">
                    <tr>
                        <th>Sr No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Model</th>
                        <th>Quantity</th>
                        <th>Setting</th>
                    </tr>
                    <?php
                    include('connection.php');
                    $sql = "select * from vehicle   order by id desc";
                    $result11 = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result11)) {

                        $i = 1;
                        while ($rows11 = mysqli_fetch_assoc($result11)) {

                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><img style="height:100px;width:100px" src="images/vehicle/<?php echo $rows11['image']; ?>"></td>
                                <td><?php echo $rows11['name']; ?></td>
                                <td><?php echo $rows11['description']; ?></td>
                                <td><?php echo $rows11['price']; ?></td>
                                <td><?php echo $rows11['model']; ?></td>
                                <td><?php echo $rows11['quantity']; ?></td>
                                <td><a href="Delete.php?delete=<?php echo $rows11['id']; ?>"><button class="btn btn-danger action">
                                            <k class="fa fa-trash"></k>
                                        </button></a>
                                    <br><br><a href="Update.php?update=<?php echo $rows11['id']; ?>"><button class="btn btn-primary action">
                                            <k class="fa fa-pencil"></k>
                                        </button></a>
                                </td>
                            </tr>
                    <?php $i++;
                        }
                    } ?>
                </table>

            </div>
        </div>
    </div>
     <?php require_once('footer.php'); ?>
</body>

</html>