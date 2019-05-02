<?php
  require "header.php"
?>
<section>

     <?php
     //we check if we have something in our valible
     if (isset($_SESSION['uservalue'])){
          $sql="SELECT * FROM users;";
          $result = mysqli_query($connect, $sql);
          $resultcheck=mysqli_num_rows($result);
          if ($resultcheck>0){
               ?>
               <div class="greennote">
                    <div class="name">
                         Welcome back <?php echo $_SESSION['uservalue'];?>
                    </div>
                    <div class="out">
                         <a href="connection/logout-connection.php">Logout</a>
                    </div>

               </div>
               <?php

          }
     }else{
          ?>
          <div class="rednote">
               <?php
               echo '<a href="login.php">Login</a><a href="signup.php">Sign up</a>';
               ?>
          </div>

          <?php
}
?>
<div class="sectionnewbooks">
     <div class="sectiontitle">
          New titles:
     </div>
     <div class="newbooks">
<?php
     //FINISH USER CHECK NAME
     //START TO PRINT THE NEW BOOKS
     $sql="SELECT * FROM books ORDER BY id DESC LIMIT 2;";
     $result = mysqli_query($connect, $sql);
     $resultcheck=mysqli_num_rows($result);

     if ($resultcheck>0) {
          while ($row=mysqli_fetch_assoc($result)) {
               echo "<div class='bookwrapper'><img src='img/cover-default.png' alt='book cover'><div class='description'><p class='booktitle'>".$row["title"]."</p><p class='bookauthor'>". $row["author"]."</p><p class='booksummary'>".$row["description"]."</p></div></div>";
          }
     };

     ?>
     </div>
</div>
     <div class="commentwrapper">
          <form class="commentform" action="connection/comment-connection.php" method="post">
               <b>Leave a comment</b>
               <input type="text" name="name" placeholder="Name/Username"  required>
               <br>
               <input type="textarea" name="comment" placeholder="Comment" required>
               <br>
               <button type="submit" name="comment-button">Comment</button>
          </form>

          <b>Comments:</b>
          <?php
          $sql="SELECT * FROM comments;";
          $result = mysqli_query($connect, $sql);
          $resultcheck=mysqli_num_rows($result);
          if ($resultcheck>0) {
               while ($row=mysqli_fetch_assoc($result)) {
                    echo "<div class='printcomment'><b>";
                    echo $row["user"];
                    echo ":</b><div class='printcommentuser'>";
                    echo $row["comment"];
                    echo "</div>";
                    echo "</div>";
               }
          }else{
               echo "No comments, be the first one";

     };
          ?>
     </div>
</section>
<?php
require "footer.php"
?>
