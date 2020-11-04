
<style>
  pre {
            overflow-x: auto;
            white-space: pre-wrap;
            white-space: -moz-pre-wrap;
            white-space: -pre-wrap;
            white-space: -o-pre-wrap;
            word-wrap: break-word;
         }

  .tab{
    display: flex;
    justify-content: center;
    flex-direction: row;
    flex-wrap: wrap;
    width: 100%;
  }
  .tablink{
    background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  margin:10px 1px 2px 0px;
  }
  .tabcontent{
    width:100%;
    margin-top: 10px;
  }
.tablink:hover {
  background-color: #777;
}
</style>

  <?php
include "connection.php";

$sql = "SELECT * FROM posts WHERE post_slug = '".$_GET['slug']."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $row = mysqli_fetch_assoc($result);
$title = $row["post_name"];
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    // echo ' <tr>
    //            <th scope="row">'. $row["id"].' </th>
    //            <td>'. $row["post_name"].'</td>
    //            <td>'. $row["datetime"].'</td>
    //            <td><a href="/edit.php?id='. $row["id"].'" class="btn btn-primary">Edit</a></td>
    //            <td><a href="/post.php?slug='. $row["post_slug"].'" class="btn btn-primary">View</a></td>
    //            <td><a href="/delete.php?id='. $row["id"].'" class="btn btn-primary">Delete</a></td>
    //         </tr>';


    echo '<header class="masthead" style="background-image: url(\'static/img/post-bg'.rand(0,7).'.jpg\')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading" style="text-shadow: 0px 7px 15px #000;">
            <h1>'. $row["post_name"].'</h1>
            <h2 class="subheading">'. $row["post_subtitle"].'</h2>
            <span class="meta">Posted by
              <a href="#">'. $row["author"].'</a>
              on '. $row["datetime"].'</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto tab">
          <iframe width="100%" id="video" height="inherit" src="'.$row["yt_link"].'" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
            '; ?>
          <button class="tablink" onclick="openPage('OverView', this, 'red')" id="defaultOpen">Overview</button>
          <button class="tablink" onclick="openPage('Files', this, 'green')">Files</button>
          <button class="tablink" onclick="openPage('Discussion', this, 'blue')">Discussion</button>
          <button class="tablink" onclick="openPage('Announcements', this, 'orange')">Announcements</button><?php
          echo '
          <div id="OverView" class="tabcontent">
            <samp><pre>'.$row["post_content"].'</pre></samp>
          </div>
          
          <div id="Files" class="tabcontent">
              <h3>Circuit Diagram</h3>
              <img width="100%" src="static/img/uploaded_files/fritzing/'. $row["fritzing_img"].'">
              <hr>
              <h3>Schematic Diagram</h3>
              <img width="100%" src="static/img/uploaded_files/schematic/'. $row["schematic_img"].'">
          </div>
          
          <div id="Discussion" class="tabcontent">
            <h3>Discussion</h3>
            <p>......</p>
          </div>
          
          <div id="Announcements" class="tabcontent">
            <h3>Announcement</h3>
            <p>No Announcements for this Post.</p>
          </div>
        </div>
      </div>
    </div>
  </article>



    ';


  
} else {
  echo "0 results";
}

  include "header.php";
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    var width = $("#video").width()
    
    $("#video").height(width/1.67 )
    
  })
  
  function openPage(pageName, elmnt, color) {
      // Hide all elements with class="tabcontent" by default */
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Remove the background color of all tablinks/buttons
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
      }

      // Show the specific tab content
      document.getElementById(pageName).style.display = "block";

      // Add the specific color to the button used to open the tab content
      elmnt.style.backgroundColor = "#0085a1";
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

</script>
  
  <?php
  include 'footer.php';
  ?>