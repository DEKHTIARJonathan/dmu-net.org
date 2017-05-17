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

	require_once "connect.php";

	$category = isset($_GET['category']) ? $_GET['category'] : '';

	$stmt = $pdo->prepare("select * from Parts where `category` = :category");
	$stmt->bindValue(':category', $category, PDO::PARAM_STR);
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$output = array();

	foreach ($result as $row){
		$data = array(
			"idPart" => $row["idPart"],
			"name" => $row["name"],
			"format" => $row["format"],
			"category" => $row["category"],
		);
		array_push($output, $data);
	}

	echo str_replace('\/','/',json_encode($output));

?>
