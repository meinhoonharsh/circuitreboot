

<?php
session_start();
include "connection.php";










if(!isset($_COOKIE['id'])){
  $_SESSION['id'] = $_COOKIE['id'];
  header("Location:login.php");
}
else if(!isset($_SESSION['id'])){
  header("Location:login.php");
}
  $title = "Dashboard | Circuit Reboot";
  include "header.php";
  ?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('static/img/dashboard.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Admin Panel</h1>
            <span class="subheading">Manage Everything here</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <h3>Basic Actions</h3>
      <a href="edit.php?id=0" class="btn btn-primary">Add New Post</a>
      <a href="logout.php" class="btn btn-primary">Logout</a>
      <hr>
      <h3>Upload a File</h3>
      <form action="upload.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="fileToUpload">
      <button type="submit" class="btn btn-primary float-right">Submit</button>
      </form>
      <hr>

         <h3>Edit/Delete Posts</h3>
        <table class="table">
         <thead class="thead-dark">
            <tr>
               <th scope="col">#</th>
               <th scope="col">Title</th>
               <th scope="col">Date</th>
               <th scope="col">Edit</th>
               <th scope="col">View</th>
               <th scope="col">Delete</th>
            </tr>
         </thead>
         <tbody>
          <?php

$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    echo ' <tr>
               <th scope="row">'. $row["id"].' </th>
               <td>'. $row["post_name"].'</td>
               <td>'. $row["datetime"].'</td>
               <td><a href="edit.php?id='. $row["id"].'" class="btn btn-primary">Edit</a></td>
               <td><a href="post.php?slug='. $row["post_slug"].'" class="btn btn-primary">View</a></td>
               <td><a href="delete.php?id='. $row["id"].'" class="btn btn-primary">Delete</a></td>
            </tr>';


  }
} else {
  echo "0 results";
}

mysqli_close($conn);
            ?>
        <!-- {% for post in posts %}
            <tr>
               <th scope="row">{{post.id}}</th>
               <td>{{post.post_name}}</td>
               <td>{{post.datetime}}</td>
               <td><a href="/edit/{{post.id}}" class="btn btn-primary">Edit</a></td>
               <td><a href="/post/{{post.post_slug}}" class="btn btn-primary">View</a></td>
               <td><a href="/delete/{{post.id}}" class="btn btn-primary">Delete</a></td>
            </tr>
        {% endfor %} -->
         </tbody>
      </table>


        <!-- Pager
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div> -->
      </div>
    </div>
  </div>
<!-- 
<div class="container" style="min-height:100% width:80%">
  {% with messages = get_flashed_messages() %}
  {% if messages %}
  {% for message in messages %}
  <div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
        aria-hidden="true">×</span></button>
    {{message}}
  </div>
  {% endfor %}
  {% endif %}
  {% endwith %}

</div> -->