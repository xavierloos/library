<?php
  require "header.php";
?>
<section>

        <h2>Password</h2>
        <fieldset>
           <legend><h3>New password</h3></legend>
           <form action="ct/np.ct.php" method="post">
             <input type="hidden" name="selector" value="<?php echo $selector ?>"><br>
             <input type="hidden" name="validator" value="<?php echo $validator ?>"><br>
               <input type="password" name="psswrd" placeholder="New password" autofocus  required><br>
               <input type="password" name="psswrd2" placeholder="Repeat" required><br>
               <button type="submit" name="newpsswrd-submit">Reset</button>
           </form>
        </fieldset>


</section>
<?php
  require "footer.php";
?>
