<?php

include "Partials/db_connect.php";

$showalert = false;
$showError =false;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    $date = $_POST['date'];


//     $sql2 = "SELECT email FROM users_data WHERE email='{$email}'";
//     $result2 = mysqli_query($conn,$sql2);
//   $count = mysqli_num_rows($result2);
//   if($count>0) {
//     $showError ="Email already taken";
//     if ($showError) {
//         # code...
//         echo "<p style='color:red'> Sorry This Email is Already Taken.</p>";
//         echo "<script>$('#submit').prop('disabled',true);</script>";
//     }else{
//     echo "<p style='color:green'> This is Email is available for Registration.</p>";
//     echo "<script>$('#submit').prop('disabled',false);</script>";
//   }
//   }

    $sql1 = "SELECT username FROM users_data WHERE username='{$username}'";
    $result1 = mysqli_query($conn,$sql1);
      if (mysqli_num_rows($result1) > 0) {
        // Restricting user if username is already taken or not
        $showError ="Username already taken";
      }
       else {
          if ($password == $cpassword) {
              # code...
              $hash = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `users_data` (`username`, `password`, `date`, `email`) VALUES ('$username', '$hash', '$date', '$email')";
                $result = mysqli_query($conn, $sql);

        if ($result) {
            # code...
           $showalert = true;
        }
      }
    //   Password and confirm ppassword doesn't matched
      else{
        $showError = "Password and Confirm Password doesn't Matched";
    } 
    }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="Partials/style.css">

    <title>iConnect</title>
</head>

<body>
    <?php
    require "navbar.php";
    ?>
    <?php

    if ($showalert) {
        # code...
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hurray😊!</strong> Your Account has been successfully connected.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>What Dude😎!</strong> '.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>

    <div class="container ">
        <h1 class="mt-4 text-center">Wants To Enjoy<br>SignUp First</h1>
        <form class="d-flex flex-column align-items-center mt-5" action="signup.php" id="submit_form" method="POST">
            <div class="mb-3 col-md-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Choose username Wisely" aria-describedby="emailHelp">
            </div>
            <div class="mb-3  col-md-4">
                <label for="email" class="form-label">Enter Your Email</label>
                <p id="check-username"></p>
                <input type="email" class="form-control" id="eamil" name="email" placeholder="Your One and Only Email" oninput="checkEmail()">
            </div>
            <div class="mb-3 col-md-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="A Password Stronger Than Your Muscle">
            </div>
            <div class="mb-3 col-md-4">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="This Must be Same as Password">
            </div>
            <div class="mb-3 col-md-4">
                <label for="password" class="form-label">Date of Birth :</label>
                <input type="date" class="form-control" name="date" placeholder="Date of Birth">
            </div>
            <div class="col-md-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input radio_class" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input radio_class" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" name="submit" class="btn btn-primary col-md-12 mt-2">Submit</button>
            </div>
            
        </form>
        <div class="text-center align-items-center mt-2">
                <span>Already Have an Account?</span><span><a href="login.php" class="ms-2">Login</a></span>
            </div>
        
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
<script type="text/javascript">
   
$(document).ready(function() {
$("#submit_form").validate({
rules: {
username : "required",
password: {
            required: true,
            minlength: 3
        },
cpassword: {
            required: true,
            minlength: 3,
            equalTo: "#password",
        },
email: {
required: true,
email: true
},
},
messages: {
    password: "Password must be more than 7 char",
    cpassword: " Enter Confirm Password Same as Password"
        }
});
});

function checkEmail() {
    
    jQuery.ajax({
    url: "create.php",
    data:'email='+$("#eamil").val(),
    type: "POST",
    success:function(data){
        $("#check-username").html(data);
    },
    error:function (){}
    });
}
    
</script>
</html>