<?php

    /*
    ########################### DMU-Net.org ##########################

    * Maintainer: Jonathan DEKHTIAR
    * Date: 2017-05-17
    * Contact: contact@jonathandekhtiar.eu
    * Twitter: https://twitter.com/born2data
    * LinkedIn: https://fr.linkedin.com/in/jonathandekhtiar
    * Personal Website: http://www.jonathandekhtiar.eu
    * RSS Feed: https://www.feedcrunch.io/@dataradar/
    * Tech. Blog: http://www.born2data.com/
    * Github: https://github.com/DEKHTIARJonathan

    *******************************************************************

     2017 May 17
     
     In place of a legal notice, here is a blessing:

        May you do good and not evil.
        May you find forgiveness for yourself and forgive others.
        May you share freely, never taking more than you give.

    *******************************************************************
    */

    require_once "../connect.php";
    
    echo("1: Loading the SQL File ...\n");
    $sql = file_get_contents('install.sql');
    
    echo("2: Executing the Installation Script in the Database ...\n");
    $qr = $pdo->exec($sql);
    
    //var_dump($pdo->errorinfo());
    
    echo("3: The Database has been succesfully installed ...\n");
    
    echo($sql);
?>