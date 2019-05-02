<?php
  require "header.php"
?>
<section>
     <?php
     if (isset($_GET["signup"])) {
       if ($_GET["signup"]=="success") {
         ?>
           <div class="greennote">
             Your account has been created!
           </div>

                     <?php
       }
     }elseif (isset($_GET["error"])) {
       if ($_GET["error"]=="nouser") {
         ?>
           <div class="rednote">
             No user or email registered, Do you want to <a href="signup.php">sign up?</a>
           </div>

                     <?php

       }if ($_GET["error"]=="invalidpassword") {
         ?>
           <div class="rednote">
             It seems you entered a wrong password, <a href="login.php">try again</a> or <a href="rst-psswrd.php">reset the password</a>
           </div>

                     <?php

       }
     }elseif (isset($_GET["reset"])) {
      if ($_GET["reset"]=="success") {
      ?>
      <div class="greennote">
      Check your Email to reset your password
      </div>
      <?php
    }
  }
?>
     <div class="login">
       <p><b>Log in</b></p>

       <img src="img/login.png" alt="login image">
       <form class="loginform" action="connection/login-connection.php" method="post">
           <input type="text" name="userormail" placeholder="User/Email" autofocus required>
           <br>
           <input type="password" name="pw" placeholder="Key" required>
           <br>
           <button type="submit" name="login-button">Access</button>
           <div class="option">
               <a class="link-options" href="rst-psswrd.php">Forgotten password?</a>
               <a class="link-options" href="signup.php">Sign Up</a>
           </div>
       </form>
     </div>

</section>
<?php
  require "footer.php"
?>
