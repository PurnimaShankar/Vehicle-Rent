<!DOCTYPE html>
<html>
<title>Vehicle</title>

<body>
    
    <?php require_once('header.php'); ?>
    <h2 class="heading"><b>Search Result</b></h2>
    <div class="container">
        <div class="row">

            <?php
            include('connection.php');
            $name = $_GET['name'];
            $sql = "select * from vehicle where name like '%$name%'  order by id desc";
            $result11 = mysqli_query($con, $sql);

            if (mysqli_num_rows($result11)) {

                $i = 1;
                while ($rows11 = mysqli_fetch_assoc($result11)) 
                {
                    $id = $rows11['id'];
                    $result=mysqli_query($con,"SELECT count(*) as vid from booking where vid='$id'");
                    $blog=mysqli_fetch_assoc($result);
                    $available = $blog['vid']-$q=$rows11['quantity'];
                     
                ?>
                    <div class="col-sm-4 div">
                        <br><br><br><img class="imagecar" src="images/vehicle/<?php echo $rows11['image']; ?>">
                        <h6 class="title"><b><?php echo $rows11['name']; ?></b></h6>
                        <hr>
                        <p><?php echo $rows11['description']; ?></p>
                        <div class="grid-container">
                            <div class="grid-item">Price: </div>
                            <div class="grid-item">$<?php echo $rows11['price']; ?></div>
                            <div class="grid-item">Model: </div>
                            <div class="grid-item"><?php echo $rows11['model']; ?></div>
                            <div class="grid-item">Available: </div>
                            <div class="grid-item"><?php echo (abs($available)); ?></div>
                        </div>
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half"></i>
                        <center><br><a href="Details.php?i=<?php echo $rows11['id'];?>"><button class="btn btn-<?php echo $available==0 ? 'danger':'primary'; ?> buttonnn" <?php echo $available==0 ? 'disabled':'Book Now'; ?>><?php echo  $available==0 ? 'Booked':'Book Now'; ?></button></a></center>
                     
                    </div>
                    <?php
                      $i++;
                    }
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

        </div>
    </div>
     <?php require_once('footer.php'); ?>
</body>

</html>