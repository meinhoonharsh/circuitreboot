

<?php
  $title = "All Posts | Circuit Reboot";
  include "header.php";
  include "connection.php";
  $n = $_GET['n'];
  $pagecount = 5;
  // "SELECT * FROM Orders LIMIT 15, 10"
  
  ?>


  <header class="masthead" style="background-image: url('static/img/home-bg<?=rand(0,5)?>.jpg')">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
               <h1>
                  All Posts | Circuit Reboot
               </h1>
               <span class="subheading"></span>
            </div>
         </div>
      </div>
   </div>
</header>

<!-- Main Content -->
<div class="container">
   <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

<?php
          
    $sql = "SELECT * FROM posts LIMIT ".$n*$pagecount.",".$pagecount;
    $result = mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM posts LIMIT ".($n+1)*$pagecount.",".$pagecount;
    $result2 = mysqli_query($conn, $sql2);
    
    if (mysqli_num_rows($result2) > 0){
      $nextpage = 0;
      // echo 'IT is Found query for Next Page';
    }else{
      $nextpage = 1;
    }
    // echo "nextpage :".$nextpage;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        // echo ' <tr>
        //            <th scope="row">'. $row["id"].' </th>
        //            <td>'. $row["post_name"].'</td>
        //            <td>'. $row["datetime"].'</td>
        //            <td><a href="edit.php?id='. $row["id"].'" class="btn btn-primary">Edit</a></td>
        //            <td><a href="post.php?slug='. $row["post_slug"].'" class="btn btn-primary">View</a></td>
        //            <td><a href="delete.php?id='. $row["id"].'" class="btn btn-primary">Delete</a></td>
        //         </tr>';


      echo '

         <div class="post-preview">
            <a href="post.php?slug='. $row["post_slug"].'">
               <h2 class="post-title">
                  '. $row["post_name"].'
               </h2>
               <h3 class="post-subtitle">
                  '. $row["post_subtitle"].'
               </h3>
            </a>
            <p>'. substr($row["post_content"],0,200).'...</p>
            <p class="post-meta">Posted by
               <a href="#">'. $row["author"].'</a>
               on '. $row["datetime"].'</p>
         </div>
         <hr>';


      }

    } else {
      echo "No Results Found";
    }


?>

         <!-- {% for post in posts %}
         <div class="post-preview">
            <a href="/post/{{post.post_slug}}">
               <h2 class="post-title">
                  {{post.post_name}}
               </h2>
               <h3 class="post-subtitle">
                  {{post.post_subtitle}}
               </h3>
            </a>
            <p>{{post.post_content[:150]}}...</p>
            <p class="post-meta">Posted by
               <a href="#">{{post.author}}</a>
               on {{post.datetime}}</p>
         </div>
         <hr>
         {% endfor %} -->


         <!-- Pager -->
         <div class="clearfix">
            <a href="?n=<?=$n-1?>" class="btn btn-primary float-left 
            <?php if($n==0){echo 'disabled';}?>
            "> &larr; PREVIOUS</a>
            <a class="btn btn-primary float-right <?php if ($nextpage){echo 'disabled';}?>" href="?n=<?=$n+1?>">NEXT &rarr;</a>
         </div>
      </div>
   </div>
</div>

  <?php
  include 'footer.php';
  ?>