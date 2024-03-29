<?php

include 'includes/art-config.inc.php';

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
    
</head>
<body >
    
<?php include 'includes/art-header.inc.php'; ?>
    
<main class="ui segment doubling stackable grid container">

    <section class="four wide column">
        <form class="ui form" method="get" action="browse-artists.php">
          <h3 class="ui dividing header">Filters</h3>

          <div class="field">
            <label>Artist</label>
            <select class="ui fluid dropdown" name="artist">
                <option value='0'>Select Artist</option>  
                <?php  
                    outputOptions($artists, 'ArtistID', 'LastName');
                ?>
            </select>
          </div>  
          <div class="field">
            <label>Museum</label>
            <select class="ui fluid dropdown" name="museum">
                <option value='0'>Select Museum</option>  
                <?php  
                   outputOptions($galleries, 'GalleryID', 'GalleryName');
                ?>
            </select>
          </div>   
          <div class="field">
            <label>Shape</label>
            <select class="ui fluid dropdown" name="shape">
                <option value='0'>Select Shape</option>  
                <?php  
                    outputOptions($shapes, 'ShapeID', 'ShapeName');
                ?>
            </select>
          </div>   

            <button class="small ui orange button" type="submit">
              <i class="filter icon"></i> Filter 
            </button>    

        </form>
    </section>
    

    <section class="twelve wide column">
        <h1 class="ui header">Artists</h1>
        <h3 class="ui sub header"><?php echo $filter; ?></h3>
        <ul class="ui divided items" id="artistsList">
            
          <?php  while ($work = $artists->fetch()) { ?>

          <li class="item">
            <a class="ui small image" href="artist.php?id=<?php echo $work['ArtistID']; ?>"><img src="images/art/works/square-medium/<?php echo $work['ImageFileName']; ?>.jpg"></a>
            <div class="content">
              <a class="header" href="artist.php?id=<?php echo $work['artistID']; ?>"><?php echo utf8_encode($work['Title']); ?></a>
              <div class="meta"><span class="cinema"><?php echo makeArtistName($work['FirstName'],$work['LastName']); ?></span></div>        
              <div class="description">
                <p><?php echo utf8_encode($work['Excerpt']); ?></p>
              </div>
              <div class="meta">     
                  <strong><?php echo '$' . number_format($work['MSRP'],0); ?></strong>        
              </div>        
              <div class="extra">
                <a class="ui icon orange button" href="cart.php?id=<?php echo $work['artistID']; ?>"><i class="add to cart icon"></i></a>
                <a class="ui icon button" href="favorites.php?id=<?php echo $work['artistID']; ?>"><i class="heart icon"></i></a>          
              </div>        
            </div>      
          </li>
            
          <?php } ?>



        </ul>        
    </section>  
    
</main>    
    

    
  <footer class="ui black inverted segment">
      <div class="ui container">footer for later</div>
  </footer>
</body>
</html>