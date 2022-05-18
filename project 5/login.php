<?php 
include 'config/connect.php';
session_start();
// login Validation function 


$le= $lp="none";
$lpErr="";
$login=mysqli_fetch_all(mysqli_query($conn,'select * from users'),MYSQLI_ASSOC);

if (isset($_POST['login'])) 
{

    $lemail=$_POST['email'];
    $lpassword=$_POST['password'];
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $lp="block";
        $lpErr="please insert email and Password";
    }
    else if ($lemail == 'admin@admin.com' && $lpassword == '123456') 
        {
            $ldate=date("d-m-Y H:i:s");
            $sql="INSERT INTO logins (updated_at) VALUE ('$ldate') WHERE users.fname='admin'";
            mysqli_query($conn , $sql);
            header('location: admin.php');
            // break;
        }

    else {
        foreach($login as $user )
        {
            if ($lemail == $user['email'] && $lpassword == $user['pass'])
            {
                $_SESSION['name']=$user['name'];
                $name=$user['name'];;
                $_SESSION['email']=$user['email'];
                $_SESSION['phone']=$user['phone'];
                $user['LLDate']=date("d-m-Y H:i:s");
                $_SESSION['users'];
                $ldate=date("d-m-Y H:i:s");
                $sql="INSERT INTO logins (login date) VALUE ('$ldate') WHERE logins.name='$name'";
                mysqli_query($conn , $sql);
                header('location: index.php');
            }
            else
            {
                $lp="block";
                $lpErr="Wrong email or Password";
            }
        }
    }
}
include 'include/header.php'; 

?>
<br><br>
<!-- Log In form -->

<form  action="login.php" method="POST" id="logForm">

    
        <h2 style="text-align:center; font-family: 'FontAwesome';
    font-weight: bolder;">Log In form</h2>
    

    <div class="form-row">
        <div class="col-md-4 offset-md-4">
        <label for="email">Your E-mail</label>   
        <input type="email" name="email" id="email" class="form-control is-inavalid" placeholder="test@test.com" value="">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 offset-md-4">
        <label for="password">Password</label>   
        <input type="password" name="password" id="password" class="form-control is-inavalid" placeholder="********" value="">
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