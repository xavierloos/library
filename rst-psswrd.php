<?php
  require "header.php"
?>
<section>
  <?php
  if(isset($_GET["error"])){
    if ($_GET["error"]=="email") {
      ?>
     <div class="rednote">
       No email registered, Do you want to <a href="signup.php">sign up </a>with this email?
     </div>
     <?php
    }
  }
   ?>
  <div class="resetcontainer">

      <p><b>Reset my password</b></p>
      <img src="img/password.png" alt="lock icon">

    <form class="reset" action="connection/rstpw.ct.php" method="post">
        <input type="email" name="email" placeholder="Email" autofocus  required><br>
        <button type="submit" name="rstpsswrd-submit">Send link to Email</button>
    </form>
    <?php
    if(isset($_GET["reset"])){
      if ($_GET["reset"]=="success") {
        echo "<p>An email has been sent to your account</p>";
      }
    }
     ?>
  </div>

</section>
<?php
  require "footer.php"
?>
