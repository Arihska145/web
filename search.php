<?php

include 'includes/art-config.inc.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
        <script src="js/misc.js"></script>
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Webstore, Art, Painting" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--theme-style-->
    <link href="css/style4.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <script src="js/jquery.min.js"></script>
    <title>Search</title>
    <?php include 'includes/art-header.inc.php'; ?>
  </head>
	<body>
      <div class="container">
        <div class="brand">
          <?php
          if(isset($_POST['submit'])) {
            if(isset($_GET['go'])) {
              if(preg_match("^/[A-Za-z]+/", $_POST['name'])) {
                $name=$_POST['name'];
                $sql="SELECT Artists.FirstName, Artists.LastName, Paintings.ArtistID, Paintings.Title, Paintings.ImageFileName FROM Paintings INNER JOIN Artists ON Paintings.ArtistID=Artists.ArtistID WHERE `Paintings.Title` LIKE '%$name%'";
                
                $count = mysqli_num_rows($query);
                if($count == "0"){
                  $output = '<h2>No result found!</h2>';
                }else{
                  while($row = mysqli_fetch_array($query)){
                    $FirstName=$row['FirstName'];
                    $LastName=$row['LastName'];
                    $Title=$row['Title'];
                    $Image=$row['ImageFileName'];

                    $output .= "<div class='col-md-3 brand-grid'><li>" . "<a class='img-responsive' href='single-painting.php?id=" . $Image . "<img src='images/art/works/square-medium/" . $Image . ".jpg'></a>" . "<a class='header' href='single-painting.php?id=" . $Title . "</a>" . $FirstName . " " . $LastName . "</a>" . "</li></div>";
                  }
                }
              }
            }
          }
          
          ?>
          
          
        </div>
      </div>
	</body>
  <footer>
    <?php include 'includes/art-footer.inc.php'; ?>
  </footer>
</html>