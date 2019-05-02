
<?php
  require "header.php"
?>
<section>
  <?php
  //we check if we have something in our valible
  if (isset($_SESSION['uservalue'])){
      //we check if we have something in our valible
      if (isset($_GET["error"])) {
        if ($_GET["error"]=="bookregistered") {
          ?>
          <div class="rednote">
            The book has already been registered - Try another title
          </div> <br>
          <?php
        }
      }
      ?>
      <div class="addbookwrapper">
        <div class="imgformbook">

        </div>
        <div class="formaddbook">
          <p><b>Add a new book</b></p>
        <form  action="connection/book-connection.php" method="post">
          <input type="text" name="title" placeholder="*Title" autofocus required><br>
          <input type="text" name="author" placeholder="*Author" required><br>
          <input type="year" name="year" placeholder="*Year" required><br>
          <input type="text" name="edition" placeholder="*Edition" required><br>
          <input type="number" name="isbn" placeholder="*ISBN" required><br>
          <input type="number" name="storage" placeholder="*Number of samples on storage" required><br>
          <textarea name="description"  rows="8" cols="60" placeholder="*About the Book" required></textarea><br>
          <h5>* = Required</h5>
          <button type="submit" name="register-button">Register</button><br>
        </form>

      </div>

        <?php

  }else{
    header("Location: ../index.php");
}
  ?>


</section>

<?php
  require "footer.php"
?>
