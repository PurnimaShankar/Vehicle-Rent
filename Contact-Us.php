<!DOCTYPE html>
<html>
<title>Contact Us</title>
<body>
    <?php require_once('header.php'); ?>
      
    <h2 class="heading"><b>Contact Us</b></h2>

    <div class="container">
        <div class="row">
           
        <div class="col-sm-12">
        <iframe  class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55565170.29301636!2d-132.08532758867793!3d31.786060306224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1661945754456!5m2!1sen!2sin"></iframe>
        </div>

        <div class="col-sm-6" style="padding-top:70px;padding-bottom:70px">
        <p>Phone: +1 26541 85694</p>
        <p>Email: info@carrent.com</p>
         <p>Address: treet:  3333 D Street City:  Bloomfield Township State/province/area:   Michigan</p>
          <button class="btn btn-primary"><k class="fa fa-facebook"></k> Facebook</button>
          <button class="btn btn-success"><k class="fa fa-whatsapp"></k> WhatsApp</button>
          <button class="btn btn-danger"><k class="fa fa-instagram"></k> Instagram</button>
      </div>

            <div class="col-sm-6" style="padding-top:70px;padding-bottom:70px">
                <h4>Fill All Required Field</h4>
                <form method="POS" action="#">
                <lavel>Name</lavel>
                <input type="text" name="name" class="form-control" required>

                <lavel>Email</lavel>
                <input type="email" name="email" class="form-control" required>

                <lavel>Phone</lavel>
                <input type="text"  onkeypress="return validateNumber(event)" name="phone" class="form-control" required>

                <lavel>Subject</lavel>
                <input type="text" name="subject" class="form-control" required>

                <lavel>Name</lavel>
                <textarea type="text" name="message" class="form-control" required></textarea>
                <br>
                <button class="btn btn-primary">Submit</button>
                </form>
             </div>
      </div>
    </div>
     <?php require_once('footer.php'); ?>
   </body>

</html>