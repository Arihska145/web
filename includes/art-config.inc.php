<?php



define('DBCONNECTION', 'mysql:host=localhost;dbname=art');
define('DBUSER', 'bin');
define('DBPASS', '1234');


spl_autoload_register(function ($class) {
    $file = 'lib/' . $class . '.class.php';
    if (file_exists($file)) 
      include $file;
});

/* localhost connection */
$pdo = DatabaseHelper::setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));

?>