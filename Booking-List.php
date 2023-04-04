<?php
require_once('connection.php');
if (isset($_POST['save'])) {
    $rand = (rand(111111, 999999));
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $model = $_POST['model'];
    $imagee = $rand . $_FILES['image']['name'];


    $sql = "insert into vehicle (name,description,price,model,image)
         values('$name','$description','$price','$model','$imagee')";

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
$result = mysqli_query($con, "SELECT count(*) as vid from booking where vid<>'0'");
$booking = mysqli_fetch_assoc($result);

$result = mysqli_query($con, "SELECT count(*) as id from vehicle");
$vehicle = mysqli_fetch_assoc($result);

$t = $vehicle['id'] - $booking['vid'];


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
                <a href="Dashboard.php"> <button class="btn btn-default"><i class="fa fa-arrow-left fafa"></i> Back </button></a>
            </div>

            <div class="col-sm-4">
                <button class="btn btn-default"><i class="fa fa-car fafa"></i> Available Vehicle : <?php echo (abs($t)); ?></button>
            </div>

            <div class="col-sm-4">
                <button class="btn btn-default"><i class="fa fa-motorcycle fafa"></i> <i class="fa fa-car fafa"></i> Total Vehicle : <?php echo $vehicle['id']; ?></button>
            </div>

        </div>
    </div>

    <h2 class="heading"><b>Booking-List</b></h2>
    <a href="Logout.php">
        <p style="text-align:right;padding-right:175px"><span class="badge badge-danger">Logout</span></p>
    </a>

    <div class="container">
        <div class="row">

            <div class="col-sm-12" style="overflow-x:auto;">
                <h4>User Data:</h4>
                <table class="table">
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Setting</th>
                    </tr>
                    <?php
                    include('connection.php');
                    $sql = "select * from booking  order by id desc";
                    $result11 = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result11)) {

                        $i = 1;
                        while ($rows11 = mysqli_fetch_assoc($result11)) {

                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows11['name']; ?></td>
                                <td><?php echo $rows11['phone']; ?></td>
                                <td><?php echo $rows11['email']; ?></td>
                                <td><?php echo $rows11['address']; ?></td>
                                <td><?php echo $rows11['fromm']; ?></td>
                                <td><?php echo $rows11['too']; ?></td>
                                <td><des title="Click To Check Details"><a href="Details.php?i=<?php echo $rows11['vid']; ?>"><button class="btn btn-success action">
                                            <k class="fa fa-eye"></k>
                                        </button></a></des>
                                    <br><br><a href="Delete-Booking.php?delete=<?php echo $rows11['id']; ?>"><button class="btn btn-danger action">
                                            <k class="fa fa-trash"></k>
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