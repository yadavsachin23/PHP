<?php

include "Partials/db_connect.php";

// session_start();

$login = false;
$showError = false;

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // $sql = "SELECT * FROM users_data WHERE username = '$username' AND password ='$password'";
  $sql = "SELECT * FROM users_data WHERE username = '$username'";
  
  $result = mysqli_query($conn, $sql);
  $num= mysqli_num_rows($result);

  if ($num == 1) {
    # code...
    while($row=mysqli_fetch_assoc($result)){
      if (password_verify($password, $row['password'])){ 
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

    header("Location: welcome.php");
  }
  else{
    $showError = "Invalid Username or Password";
  }
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

    <title>iConnect</title>
  </head>
  <body>
  <?php 
        require "navbar.php";
    ?>
    <?php

if ($login) {
    # code...
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation😊!</strong> You are Successfully Logged in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
if ($showError) {
  # code...
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Congratulation😊!</strong> '. $showError .';
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>
      <div class="container">
      <h1 class="text-center">Login To Continue</h1>
            <form class="d-flex flex-column align-items-center mt-5" action="login.php" id="submit_form" method="POST">
            <div class="mb-3 col-md-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Your Choosen Username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Your Choosen Password">
            </div>
            <div class="col-md-4">
                <button type="submit" name="submit" class="btn btn-primary col-md-12 mt-2">Login</button>
            </div>
        </form>
        <div class="text-center align-items-center mt-2">
                <span>Don't Have an Account?</span><span><a href="signup.php" class="ms-2">Signup</a></span>
            </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>