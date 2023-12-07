<?php
$title = "Contact";
include('./includes/db.php');
if (isset($_POST['submit'])) {
  $fname = $_POST['fullnname'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $sql = "INSERT INTO `enquiries`(`name`, `email`, `message`) VALUES ('$fname','$email','$message')";
  $res = mysqli_query($conn, $sql);
  if ($res) {
    header("location: ./contact.php");
  }
}
include("./includes/header.php");
include('./includes/navbar.php');
?>

<style>
  body {
    background-color: white;
  }
</style>
<div class="container-fluid p-0 pt-1">
  <div class="blog-heading-img ">
    <div class="heading">
      <h5><a href="index.php">HOME</a> /BLOG</h5>
      <h1>Contact Us</h1>
    </div>
  </div>
</div>

<div class="container-fluid my-5 p-3">
  <div class="row ">
    <div class="col-lg-8 col-md-7 ">
      <div class="contact-map mt-5">
        <iframe style="border:none;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387194.0734675016!2d-74.31000422508784!3d40.697017360110685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1701021482560!5m2!1sen!2s" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <div class="col-lg-4 col-md-5">
      <form action="#" method="post">
        <div class="con-form-sec mt-5">
          <div class="heading">
            <h3>For Enquiries</h3>
          </div>
          <div class="input-sec mt-3">
            <input type="text" name="fullnname" class="form-control" placeholder="Name" required>
          </div>
          <div class="input-sec mt-3">
            <input type="text" name="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="input-sec mt-3">
            <textarea name="message" class="form-control" placeholder="Message" style="height: 110px;" required></textarea>
          </div>
          <div class="input-sec mt-3">
            <button name="submit" id="sendbtn">Send Message</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="mt-5">
  <?php
  include('./includes/footer.php');
  include('./includes/end_links.php');
  ?>
</div>