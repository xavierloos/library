<?php
  require "header.php"
?>
<?php
if (isset($_GET["error"])) {
  if ($_GET["error"]=="usertaken") {
?>
<div class="rednote">
Sorry, the user has already been taken, try another one
</div>
<?php
}

if ($_GET["error"]=="passwordcheck") {
?>
<div class="rednote">
Sorry, the password doesn't match with the confirmation!
</div>
<?php
}
}
?>
<section>
  <div class="fromwrapper">
    <div class="img">

    </div>
    <div class="formsign">
      <p><b>Registration Info</b></p>
      <form action="connection/signup-connection.php" method="post">

        <input type="text" name="name" placeholder="*Full Name" autofocus required><br>
        <input type="text" name="user" id="usrId" placeholder="*User" required><br>
        <input type="email" name="email" id="usrId" placeholder="*Email" required><br>
        <input type="password" name="password1" placeholder="*Password" required><br>
        <input type="password" name="password2" placeholder="*Repeat password" required><br>
        <h4>* = Required</h4>
        <h6>By clicking Create Account, you agree to our <a href="#">Terms</a> .
          Learn how we collect, use and share your data in our <a href="#">Data Policy</a>
          and how we use cookies and similar technology in our <a href="#">Cookie Policy</a> .
          You may receive SMS notifications from us and can opt out at any time.</h6>
        <button type="submit" name="signup-button">Create account</button><br>
        <a class="link-options" href="login.php">Already have an accout?</a>
      </form>
    </div>
  </div>



</section>

<?php
  require "footer.php"
?>
