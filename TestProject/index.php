<?php 

    $config = parse_ini_file('config.ini'); 
    $mysqli = new mysqli('localhost', $config['username'], $config['password'], 'mysql');
    unset ($config);  
    // /*
    //  * This is the "official" OO way to do it,
    //  * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
    //  */
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }
    
    /*
     * Use this instead of $connect_error if you need to ensure
     * compatibility with PHP versions prior to 5.2.9 and 5.3.0.
     */
    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    
    echo 'Success... ' . $mysqli->host_info . "\n";
    
    $mysqli->close();

?>

<!DOCTYPE html>
<html>
    <head>
  
    <meta charset="utf-8" />
    <title>PHP Test</title>
    </head>
    <body>
        <h1>PHP Test<h1>
        <?php
            $welcome = "<h2>Hello PHP World</h2>";
            print($welcome);
        ?>
    </body>
</html>