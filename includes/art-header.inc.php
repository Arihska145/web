<?php

include 'includes/art-config.inc.php';
include 'includes/art-functions.inc.php';

try {
    
    // connect and retrieve data for filters    
    $artistDB = new ArtistDB($pdo);
    $artists = $artistDB->getAll();   
    
    $galleryDB = new GalleryDB($pdo);
    $galleries = $galleryDB->getAll(); 
    
    $shapeDB = new ShapeDB($pdo);
    $shapes = $shapeDB->getAll();    
    
    
    // now retrieve paintings ... either all or a subset
    $paintDB = new PaintingDB($pdo);
    
    // filter by artist?
    if (isset($_GET['artist']) && ! empty($_GET['artist'])) {
        $paintings = $paintDB->findByArtist($_GET['artist']);
        
        $artist = $artistDB->findById($_GET['artist']);
        $filter = 'Artist = ' . makeArtistName($artist['FirstName'],$artist['LastName']) ;
    }
    
    // filter by museum?
    if (isset($_GET['museum']) && ! empty($_GET['museum'])) {
        $paintings = $paintDB->findByGallery($_GET['museum']);
        
        $museum = $galleryDB->findById($_GET['museum']);
        $filter = 'Museum = ' . utf8_encode($museum['GalleryName']);
    }    
    
    // filter by shape?
    if (isset($_GET['shape']) && ! empty($_GET['shape'])) {
        $paintings = $paintDB->findByShape($_GET['shape']);
        
        $shape = $shapeDB->findById($_GET['shape']);
        $filter = 'Shape = ' . $shape['ShapeName'];
    }     
                                            
    if (! isset($paintings) || $paintings->rowCount() == 0) {
        $paintings = $paintDB->getAll();
        $filter = "All Paintings [Top 20]";
    }
    
        
}
catch (PDOException $e) {
   die( $e->getMessage() );
}

function outputOptions($data, $valueField, $dataField) {
  while ($single = $data->fetch()) { 
    echo '<option value=' . $single[$valueField] . '>';
    echo utf8_encode($single[$dataField]);
    echo '</option>'; 
  }       
}

function makeArtistName($first, $last) {
    return utf8_encode($first . ' ' . $last);
}

?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
        <script src="js/misc.js"></script>
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
 
				<title>Shopin A Ecommerce Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
				<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
				<!-- Custom Theme files -->
				<!--theme-style-->
				<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
				<!--//theme-style-->
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
				Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
				<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
				<!--theme-style-->
				<link href="css/style4.css" rel="stylesheet" type="text/css" media="all" />	
				<!--//theme-style-->
				<script src="js/jquery.min.js"></script>
				<!--- start-rate---->
				<script src="js/jstarbox.js"></script>
					<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
						<script type="text/javascript">
							jQuery(function() {
							jQuery('.starbox').each(function() {
								var starbox = jQuery(this);
									starbox.starbox({
									average: starbox.attr('data-start-value'),
									changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
									ghosting: starbox.hasClass('ghosting'),
									autoUpdateAverage: starbox.hasClass('autoupdate'),
									buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
									stars: starbox.attr('data-star-count') || 5
									}).bind('starbox-value-changed', function(event, value) {
									if(starbox.hasClass('random')) {
									var val = Math.random();
									starbox.next().text(' '+val);
									return val;
									} 
								})
							});
						});
						</script>
				<!---//End-rate---->

    <meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
        <script src="js/misc.js"></script>
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
  
  
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
</head>
<header>
    <div class="ui attached stackable grey inverted  menu">
        <div class="ui container">
            <nav class="right menu">            
                <div class="ui simple  dropdown item">
                  <i class="user icon"></i>
                  Account
                    <i class="dropdown icon"></i>
                  <div class="menu">
                    <a class="item" href="login.php"><i class="sign in icon"></i> Login</a>
                    <a class="item" href="signup.php"><i class="sign in icon"></i> Sign Up</a>
                    <a class="item"><i class="edit icon"></i> Edit Profile</a>
                    <a class="item"><i class="globe icon"></i> Choose Language</a>
                    <a class="item"><i class="settings icon"></i> Account Settings</a>
                  </div>
                </div>
                <a class=" item" href="favourite.inc.php">
                  <i class="heartbeat icon"></i> Favorites
                </a>        
                <a class=" item" href="cart-box.inc.php">
                  <i class="shop icon"></i> Cart
                </a>                                     
            </nav>            
        </div>     
    </div>   
    
    <div class="ui attached stackable borderless huge menu">
        <div class="ui container">
            <h2 class="header item">
              <img src="images/logo5.png" class="ui small image" >
            </h2>  
            <a class="item" href="index.php">
              <i class="home icon"></i> Home
            </a>       
            <a class="item" href="contact.php">
              <i class="mail icon"></i> About Us
            </a>      
            <a class="item" href="artworks.php">
              <i class="home icon"></i> Artworks
            </a>      
            <div class="ui simple dropdown item">
              <i class="grid layout icon"></i>
              Browse
                <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item" href="browse-artists.php"><i class="users icon"></i> Artists</a>
                <a class="item" href="browse-genres.php"><i class="theme icon"></i> Genres</a>
                <a class="item" href="browse-paintings.php"><i class="paint brush icon"></i> Paintings</a>
                <a class="item"><i class="cube icon"></i> Subjects</a>
              </div>
            </div>        
            <div class="right item">
              <form method="POST" action="search.php">
                <div class="ui mini icon input">
                  <input type="text" name="q" placeholder="query">
                  <button type="submit" name="search" value="Search" href="search.php"><i class="search icon"></i></button>
                </div>
              </form>
            </div>      

        </div>
    </div>   
    
</header> 