<?php
require_once('connection.php');
$id = $_GET['delete'];
mysqli_query($con,"delete from vehicle where id = '$id'");

if(mysqli_affected_rows($con)==1)
{
    echo '<script>alert("Are You Sure!")</script>';
    echo '<script>window.location.href="Dashboard.php"</script>';
}

else
{
echo '<script>alert("Try Again")</script>';
}
?>