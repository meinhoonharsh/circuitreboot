<?php
  $title = "Home | Circuit Reboot";
  include "header.php";
  $playlists= [
    [
        "icon"=> "be.png",
        "title"=> "Basic Electronics for Beginners",
        "description"=> "In this Series, We are going to learn about the Basic Concepts of Electronics",
        "slug"=> "basic-electronics"
    ],
    [
        "icon"=> "ardu.png",
        "title"=> "Arduino Tutorial for Beginners",
        "description"=> "In this Series, We are going to learn about the Coding in Arduino",
        "slug"=> "arduino-tutorial"
    ],
    [
        "icon"=> "diy.png",
        "title"=> "DIY (Do It Yourself)",
        "description"=> "doesnt have any good description yet",
        "slug"=> "diy"
    ],
    [
        "icon"=> "sam.png",
        "title"=> "Sensors & Modules | You Must Know",
        "description"=> "doesnt have any good description yet",
        "slug"=> "sensor-module"
    ]
];
?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('static/img/home.jpeg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Circuit Reboot</h1>
            <span class="subheading">Make it Different</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container-fluid main-container">
    <div class="row my-4 mx-4">

      <?php
      foreach ($playlists as $playlist) {
        

      echo '<div class="col-md-6 col-lg-4 text-center">
        <img class="rounded-circle" src="static/img/'.$playlist['icon'].'" width="140" height="140">
        <h2>'.$playlist['title'].'</h2>
        <p>
          '.$playlist['description'].'
        </p>
        <p>
  
          <a href="category.php?playlist='.$playlist['slug'].'&n=0"><button class="btn btn-primary">Start Watching
              »</button></a>
  
        </p>
      </div>';
      }
      ?>
  
  
      
  
  
    </div>
  </div>

  <?php
  include 'footer.php';
  ?>