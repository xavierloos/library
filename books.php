<?php
  require "header.php"
?>
<section>
     <?php
//we check if we have something in our valible
     if (isset($_SESSION['uservalue'])) {
          if (isset($_GET["book"])) {
               if ($_GET["book"]=="registered") {
     ?>
     <div class="greennote">
          <div class="name">
               Book registered successfully - <a href="book-register.php">Add another one</a>
          </div>
     </div>
     <?php
               }
          }else{
     ?>
     <div class="greennote">
          <div class="name">
               <a href="book-register.php">Add a new book to the library</a>
          </div>
     </div>
     <?php
          }
     ?>
     <div class="sectionnewbooks">
          <div class="sectiontitle">
               BOOKS:
          </div>
          <div class="newbooks">
     <?php
     $sql="SELECT * FROM books;";
     $result = mysqli_query($connect, $sql);
     $resultcheck=mysqli_num_rows($result);
     if ($resultcheck>0) {
          while ($row=mysqli_fetch_assoc($result)) {
          echo "<div class='bookwrapper'><img src='img/cover-default.png' alt='book cover'><div class='description'><p class='booktitle'>".$row["title"]."</p><p class='bookauthor'>". $row["author"]."</p><p class='booksummary'>".$row["description"]."</p></div></div>";
          }
     }
          ?>
          </div>
     </div>
     <?php
}else{
     ?>
     <div class="rednote">
          <?php
          echo '<a href="login.php">Login</a> to add new book to the library or
               <a href="signup.php">Sign up</a>';
               ?>

       </div>

      <div class="sectionnewbooks">
           <div class="sectiontitle">
                BOOKS:
           </div>
           <div class="newbooks">

     <?php
     $sql="SELECT * FROM books;";
     $result = mysqli_query($connect, $sql);
     $resultcheck=mysqli_num_rows($result);

     if ($resultcheck>0) {
          while ($row=mysqli_fetch_assoc($result)) {
          echo "<div class='bookwrapper'><img src='img/cover-default.png' alt='book cover'><div class='description'><p class='booktitle'>".$row["title"]."</p><p class='bookauthor'>". $row["author"]."</p><p class='booksummary'>".$row["description"]."</p></div></div>";
     }
     }
     ?>
     </div>
</div>
<?php

};
     ?>

</section>

<?php
require "footer.php"
?>
