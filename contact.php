<?php
session_start();



include "connection.php";
if(isset($_POST['submit'])){
  $name= $_POST['name'];
  $email= $_POST['email'];
  $phone= $_POST['phone'];
  $message= $_POST['message'];
  //echo '<script>alert("'.$name.' '. $email.' '. $password.'")</script>';


  //Create Connection
  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }

  

  //Checking if user Already Exist
  // $sql = "SELECT * FROM user WHERE email='".$email."'";
  // $result = mysqli_query($conn, $sql);
  // if (mysqli_num_rows($result) > 0) {
  //   echo "<script>alert('Email: ".$email." has been Already Registered')</script>";
  // } else {

    //Inserting New User Data into table
    $query = "INSERT INTO contact (name,email,phone,message) VALUES ('".$name."','".$email."','".$phone."','".$message."')";
    if (mysqli_query($conn, $query)) {
          $id = 1;
          // echo "<script>alert('Your Account has been Created successfully')</script>";



    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }



  $title = "Contact | Circuit Reboot";
  include "header.php";
  ?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('static/img/contact.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contact Me</h1>
            <span class="subheading">Have questions? I have answers.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form name="sentMessage" id="contactForm" action="contact.php" method="POST">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input name="name" type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input name="email" type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Phone Number</label>
              <input name="phone" type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea name="message" rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" name="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
        </form>
      </div>
    </div>
  </div>




  <?php
  include 'footer.php';
  ?>