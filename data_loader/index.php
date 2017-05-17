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

    $stmt = $pdo->prepare("TRUNCATE TABLE `Parts`");
	$stmt->execute();
    
    $stmt = $pdo->prepare("ALTER TABLE tablename AUTO_INCREMENT = 1");
	$stmt->execute();
    
    echo("1: Parts Table has been successfully truncated ...\n");
    
    $rows = array_map('str_getcsv', file('generation.csv'));
    $header = array_shift($rows);
    
    echo("2: CSV Input File has been loaded ...\n");
    
    $stmt = $pdo->prepare("INSERT INTO `Parts` (`idPart`, `category`, `original_partName`, `name`, `format`) VALUES (NULL, :category, :partname, :name, :format)");
    
    foreach ($rows as $row) {
        $tmp = (array_combine($header, $row));
        
        $stmt->bindValue(':category', $tmp["category"], PDO::PARAM_STR);
        $stmt->bindValue(':partname', $tmp["original_partName"], PDO::PARAM_STR);
        $stmt->bindValue(':name', $tmp["name"], PDO::PARAM_STR);
        $stmt->bindValue(':format', $tmp["format"], PDO::PARAM_STR);
        $stmt->execute();
    }  
    
    echo("3: All the parts have been loaded in the database...\n");
?>