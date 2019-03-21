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
    
    
    // now retrieve artists ... either all or a subset
    $paintDB = new artistDB($pdo);
    
    // filter by artist?
    if (isset($_GET['artist']) && ! empty($_GET['artist'])) {
        $artists = $paintDB->findByArtist($_GET['artist']);
        
        $artist = $artistDB->findById($_GET['artist']);
        $filter = 'Artist = ' . makeArtistName($artist['FirstName'],$artist['LastName']) ;
    }
    
    // filter by museum?
    if (isset($_GET['museum']) && ! empty($_GET['museum'])) {
        $artists = $paintDB->findByGallery($_GET['museum']);
        
        $museum = $galleryDB->findById($_GET['museum']);
        $filter = 'Museum = ' . utf8_encode($museum['GalleryName']);
    }    
    
    // filter by shape?
    if (isset($_GET['shape']) && ! empty($_GET['shape'])) {
        $artists = $paintDB->findByShape($_GET['shape']);
        
        $shape = $shapeDB->findById($_GET['shape']);
        $filter = 'Shape = ' . $shape['ShapeName'];
    }     
                                            
    if (! isset($artists) || $artists->rowCount() == 0) {
        $artists = $paintDB->getAll();
        $filter = "All artists [Top 20]";
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