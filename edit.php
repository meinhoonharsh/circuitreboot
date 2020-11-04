
  <?php
include "connection.php";
if ($_GET['id'] != 0){
      $sql = "SELECT * FROM posts WHERE id = '".$_GET['id']."'";
      $result = mysqli_query($conn, $sql);


      if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $img_name = str_replace("|","-",str_replace(" ","-",$title));

      if (move_uploaded_file($_FILES["fritzing"]["tmp_name"], "static/img/uploaded_files/fritzing/".$img_name.".jpg")) {} else {
        echo "Sorry, there was an error uploading your file.";
      }
      if (move_uploaded_file($_FILES["schematic"]["tmp_name"], "static/img/uploaded_files/schematic/".$img_name.".jpg")) {} else {
        echo "Sorry, there was an error uploading your file.";
      }


      // $query = "INSERT INTO `posts` (`id`, `post_name`, `post_subtitle`, `post_content`, `author`, `playlist`, `post_slug`, `fritzing_img`, `schematic_img`, `yt_link`, `tags`, `datetime`) VALUES (NULL, 'Light Detector using NE555 and LDR at home', 'this is a subtitle for testing', 'this is some random text', 'harsh', 'basic-electronics', 'this-is-slug-for-post', '01.jpg', '02.jpg', 'https://www.youtube.com/embed/UhTRrjYXqPU', 'ha,rsh', CURRENT_TIMESTAMP)";

          $query = "UPDATE `posts` SET post_name = '".$title."', post_subtitle = '".$_POST['subtitle']."',post_content = '".$_POST['content']."',author = '".$_POST['author']."',playlist = '".$_POST['playlist']."',post_slug ='".$img_name."',fritzing_img = '".$img_name.".jpg',schematic_img = '".$img_name.".jpg', yt_link = '".$_POST['link']."' , tags = '".$_POST['tags']."' WHERE id=".$_GET['id'];
    if (mysqli_query($conn, $query)) {
          $id = mysqli_insert_id($conn);
          // header("Location:edit.php?id=".$_GET['id']);
          // echo "<script>alert('Your Account has been Created successfully')</script>";



    } else {
      echo "Error:  <br>" . mysqli_error($conn);
    }
        }


      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        $title = $row["post_name"];



      }
}else{
  $id = 0;
    $title = "Add Post | Circuit Reboot";
    if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $img_name = str_replace("|","-",str_replace(" ","-",$title));

      if (move_uploaded_file($_FILES["fritzing"]["tmp_name"], "static/img/uploaded_files/fritzing/".$img_name.".jpg")) {} else {
        echo "Sorry, there was an error uploading your file.";
      }
      if (move_uploaded_file($_FILES["schematic"]["tmp_name"], "static/img/uploaded_files/schematic/".$img_name.".jpg")) {} else {
        echo "Sorry, there was an error uploading your file.";
      }


      // $query = "INSERT INTO `posts` (`id`, `post_name`, `post_subtitle`, `post_content`, `author`, `playlist`, `post_slug`, `fritzing_img`, `schematic_img`, `yt_link`, `tags`, `datetime`) VALUES (NULL, 'Light Detector using NE555 and LDR at home', 'this is a subtitle for testing', 'this is some random text', 'harsh', 'basic-electronics', 'this-is-slug-for-post', '01.jpg', '02.jpg', 'https://www.youtube.com/embed/UhTRrjYXqPU', 'ha,rsh', CURRENT_TIMESTAMP)";

     $queryall =  "INSERT INTO `allposts` (`id`, `post_name`, `post_subtitle`, `post_content`, `author`, `playlist`, `post_slug`, `fritzing_img`, `schematic_img`, `yt_link`, `tags`, `datetime`) VALUES (NULL, '".$title."', '".$_POST['subtitle']."', '".$_POST['content']."', '".$_POST['author']."', '".$_POST['playlist']."', '".$img_name."', '".$img_name.".jpg', '".$img_name.".jpg', '".$_POST['link']."', '".$_POST['tags']."', CURRENT_TIMESTAMP)";

          // $queryall = "INSERT INTO `allposts` (`id`,`post_name`, `post_subtitle`, `post_content`, `author`, `playlist`, `post_slug`, `fritzing_img`, `schematic_img`, `yt_link`, `tags`, `datetime`) VALUES (NULL,'".$title."','".$_POST['subtitle']."','".$_POST['content']."','".$_POST['author']."','".$_POST['playlist']."','".$img_name."','".$img_name.".jpg','".$img_name.".jpg','".$_POST['link']."','".$_POST['tags']."', CURRENT_TIMESTAMP)";
           if (mysqli_query($conn, $queryall)) {}else{
            echo 'cant add data to all posts';
           }

          $query = "INSERT INTO `posts` (`id`,`post_name`, `post_subtitle`, `post_content`, `author`, `playlist`, `post_slug`, `fritzing_img`, `schematic_img`, `yt_link`, `tags`, `datetime`) VALUES (NULL,'".$title."','".$_POST['subtitle']."','".$_POST['content']."','".$_POST['author']."','".$_POST['playlist']."','".$img_name."','".$img_name.".jpg','".$img_name.".jpg','".$_POST['link']."','".$_POST['tags']."', CURRENT_TIMESTAMP)";
          

    if (mysqli_query($conn, $query)) {
          $id = mysqli_insert_id($conn);
          header("Location:edit.php?id=".$id);
          // echo "<script>alert('Your Account has been Created successfully')</script>";



    } else {
      echo "Error:  <br>" . mysqli_error($conn);
    }
        }

      $row = [
              "post_name"=>"", 
              "post_subtitle" => "",
              "post_content" => "",
              "author" => "",
              "playlist" => "",
              "fritzing_img" => "",
              "schematic_img" => "",
              "yt_link"=> "",
              "tags" => ""
      ];
}

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
         <a href="dashboard.php" class="btn btn-primary">Go to DashBoard</a>
         <a href="logout.php" class="btn btn-primary">Logout</a>
         <hr>

         <h3>Edit/Add Post</h3>
      <form name="sentMessage" id="contactForm" action="edit.php?id=<?=$_GET['id'];?>" method="POST" enctype="multipart/form-data">
         <div class="control-group">
            <div class="form-group floating-label-form-group controls">
               <label>Title</label>
               <input name="title" type="text" value="<?=$row['post_name'];?>"  class="form-control" placeholder="Title" id="name" required
                  data-validation-required-message="Please enter your name.">
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <div class="control-group">
            <div class="form-group floating-label-form-group controls">
               <label>SubTitle</label>
               <input name="subtitle" type="text" value="<?=$row['post_subtitle'];?>"  class="form-control" placeholder="Subtitle" id="email"
                  data-validation-required-message="Please enter your email address.">
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
               <label>Author</label>
               <input name="author" value="<?=$row['author'];?>"  type="text" class="form-control" placeholder="Author" id="phone" required
                  data-validation-required-message="Please enter your phone number.">
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <div class="control-group">
            <div class="form-group floating-label-form-group controls">
               <label>Content</label>
               <textarea name="content" rows="25" class="form-control" placeholder="Content" id="message" required
                  data-validation-required-message="Please enter a message."><?=$row['post_content'];?></textarea>
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
               <label>Playlist</label>
               <select name="playlist" class="form-control" placeholder="Slug" id="playlist" required
                  data-validation-required-message="Please enter your phone number.">
                  <option value="basic-electronics">Basic Electronics</option>
                  <option value="arduino-tutorial">Arduino Tutorial</option>
                  <option value="diy">DIY</option>
                  <option value="sensor-module">Sensors and Module</option>
               </select>
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
               <label>Fritzing Image</label>
               <input name="fritzing" value="{{post.fritzing_img}}" type="file" class="form-control" placeholder="Fritzing Image" id="phone"
                  data-validation-required-message="Please enter your phone number.">
               <p class="help-block text-danger"></p>
            </div>
         </div><div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
               <label>Schematic Diagram</label>
               <input name="schematic" value="{{post.schematic_img}}" type="file" class="form-control" placeholder="Schematic Diagram" id="phone"
                  data-validation-required-message="Please enter your phone number.">
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
               <label>Link</label>
               <input name="link"  value="<?=$row['yt_link'];?>" type="text" class="form-control" placeholder="Link" id="phone" required
                  data-validation-required-message="Please enter your phone number.">
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
               <label>Tags</label>
               <input name="tags" type="text" class="form-control" placeholder="Tags" value="<?=$row['tags'];?>" id="phone"    data-validation-required-message="Please enter your phone number.">
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <br>
         <div id="success"></div>
         <button type="submit" name="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
      </form>

        <!-- Pager
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div> -->
      </div>
    </div>
  </div>


  <?php
  include 'footer.php';
  ?>