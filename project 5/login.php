<?php include 'include/header.php'; ?>


<!-- login Validation function -->
<?php

 
?>
<br><br>
<!-- Log In form -->

<form  action="login.php" method="POST" id="logForm">

    
        <h2 style="text-align:center; font-family: 'FontAwesome';
    font-weight: bolder;">Log In form</h2>
    

    <div class="form-row">
        <div class="col-md-4 offset-md-4">
        <label for="email">Your E-mail</label>   
        <input type="email" name="email" id="email" class="form-control is-inavalid" placeholder="test@test.com">
        <div class="invalid-feedback" style="display:<?php echo $le ?>">
        <?php echo $leErr ?>
        </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 offset-md-4">
        <label for="password">Password</label>   
        <input type="password" name="password" id="password" class="form-control is-inavalid" placeholder="********">
        <div class="invalid-feedback" style="display:<?php echo $lp ?>">
        <?php echo $lpErr ?>
        </div>
        </div>
    </div>

    <button class="btn btn-success col-md-4 offset-md-4" type="submit" name="login">LOG IN</button>
    <br><br>
<!-- End Log In form -->

<!-- switch to signup form -->
</form>
<form  action="login.php" method="POST" id="sForm">
<button class="btn btn-warning col-md-4 offset-md-4" type="submit" name="switch"><a href="./register.php">Sign Up !!!</a></button>
</form>
<!-- end of switch to signup form -->




<br><br>
<?php require 'include/footer.php'; ?>