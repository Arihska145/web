<?php
session_start();
if (!isset($_SESSION['id'])) {
    header( 'Location: login_form.php' ) ;
}
?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <title>LogIn</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <link href="../public/stylesheetsfilm_styles.css" rel="stylesheet" type="text/css" />
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../public/index.php"><?php require("../private/share/header.php") ?></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="../public/index.php">Top</a></li>
          <li><a href="../public/movies.php">Movies</a></li>
        </ul>
      </div>
    </nav>
  </head>
    <body>
      <h1>Login</h1> 
      <?php
      $servername = "localhost";
      $username = "bin";
      $password = "1234";
      $dbname = "art";

      // Check connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      } else {
        //get the users password
        $password = $_POST["password"];

        //see if can find a user
        $sql = "SELECT * FROM admins WHERE username='".$_POST["username"]."';";

        //echo $sql;

        $res2 = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res2) > 0) {

          $row = mysqli_fetch_assoc($res2);

          //see if there password matches the one in db
          $allowed = password_verify($password,$row["hashed_password"]);

          if($allowed){
            echo "access granted!";

            //Create some session variables
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];

            echo $_SESSION["id"];
            echo $_SESSION["username"];

            //go to the admin area
            header( 'Location: admin.php' );
          } else {
            //send back to login page
            header( 'Location: login_form.php' ); 
          }
        } 
      }
      mysqli_close($conn); 
      ?>
      <br>
      <a href="admin.php">Back to Admin</a>
    </body>
</html>