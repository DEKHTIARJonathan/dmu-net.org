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

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require_once "config.php";
	
	
	try
	{
		$pdo = new PDO('mysql:host='.$_CONFIG['sql_host'].';dbname='.$_CONFIG['sql_db'], $_CONFIG['sql_user'], $_CONFIG['sql_pass']);
	}
	catch(Exception $e)
	{
		echo 'Echec de la connexion a la base de donnees';
		exit();
	}

?>