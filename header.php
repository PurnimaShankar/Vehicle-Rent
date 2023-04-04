<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<head>
    <!-- CSS only -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/javascript.js"></script>
    
</head>
<div class="container">
   
   <div class="modal fade" id="myModall" role="dialog">
     <div class="modal-dialog">
     
       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">My Booking</h4>
         </div>
         <form action="My-Booking.php" method="GET">
         <div class="modal-body">
           <input type="email" required class="form-control" name="name" placeholder="Enter You Email">
           <br><button type="submit" class="btn btn-primary" >Search</button>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
         </form>
       </div>
       
     </div>
   </div>
   
 </div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <h2><b>Vehicle Rent</b></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="About-Us.php">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="Vehicle.php">Vehiche</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="Contact-Us.php">Contact</a>
                </li>
 
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModall">My Booking</a>
                </li>


                <li class="nav-item">
                    <?php
                     if(isset($_SESSION["loggedin"]))
                               
                     
                    {
                        echo '<a class="nav-link" href="Dashboard.php">Dashboard</a>';
                    }
                    
                    else {
                        echo '<a class="nav-link" href="Logout.php">Login</a>';
                    }
                    ?>
                    
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0" action="Search.php">
                <input class="form-control mr-sm-2" type="search" required placeholder="Search" name="name" aria-label="Search">
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
 