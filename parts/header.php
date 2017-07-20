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

    ini_set('display_startup_errors',1);
    ini_set('display_errors',1);
    error_reporting(-1);

    header( "Last-Modified: " . gmdate( "D, d M Y H:i:s") . " GMT");
    header( "Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
    header( "Cache-Control: post-check=0, pre-check=0", false);
    header( "Pragma: no-cache"); // HTTP/1.0
    header( "Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

    require_once "connect.php";

    $filename = explode("/" , $_SERVER['PHP_SELF']);
    $filename = end($filename);
?>

    <!DOCTYPE html>
    <html lang="en">
    <!--[if lt IE 7]>            <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>                 <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>                 <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="">
    <!--<![endif]-->

    <head>

        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta Http-Equiv="Cache" content="no-cache">
        <meta Http-Equiv="Pragma-Control" content="no-cache">
        <meta Http-Equiv="Cache-directive" Content="no-cache">
        <meta Http-Equiv="Pragma-directive" Content="no-cache">
        <meta Http-Equiv="Cache-Control" Content="no-cache">
        <meta Http-Equiv="Pragma" Content="no-cache">
        <meta Http-Equiv="Expires" Content="0">
        <meta Http-Equiv="Pragma-directive: no-cache">
        <meta Http-Equiv="Cache-directive: no-cache">

        <title>DMU-Net Dataset</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/img/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">

        <!-- CDN LIBRARIES -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <?php
            if ($filename == "explore.php")
                echo '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-treegrid/0.2.0/css/jquery.treegrid.min.css">';
        ?>

        <!-- CUSTOM CSS -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/responsive.css">

        <style>
            #publicationOfflineModal .modal-dialog  {width:75%;}

        </style>
    </head>

    <body>
        <a href="https://github.com/DEKHTIARJonathan/dmu-net.org" target="_blank">
            <img style="position: fixed; top: 0; right: 0; border: 0; z-index: 1050;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png">
        </a>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                        if ($filename == "index.php")
                            echo '<a class="navbar-brand" href="#">';
                        else
                            echo '<a class="navbar-brand" href="/">';
                    ?>
                        <span style="color:#676767">DMU</span><span style="color:#9c9c9c">Net</span>
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <?php
                                if ($filename == "index.php")
                                    echo '<a href="#">Home</a>';
                                else
                                    echo '<a href="/">Home</a>';
                            ?>
                        </li>
                        <li>
                            <?php
                                if ($filename == "index.php")
                                    echo '<a href="#citation">Citation</a>';
                                else
                                    echo '<a href="/#citation">Citation</a>';
                            ?>
                        </li>
                        <li>
                            <?php
                                if ($filename == "explore.php")
                                    echo '<a href="#">Explore</a>';
                                else
                                    echo '<a href="/explore.php">Explore</a>';
                            ?>
                        </li>
                        <li>
                            <?php
                                if ($filename == "about.php")
                                    echo '<a href="#">About DMU-Net</a>';
                                else
                                    echo '<a href="/about.php">About DMU-Net</a>';
                            ?>
                        </li>
                        <li >
                            <a href="#" onclick="openModal(event);return false;">Download</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <script>
            function openModal(e){
                console.log("test");
                e.preventDefault();
                e.stopImmediatePropagation();
                $('#publicationOfflineModal').modal('show');
            }
        </script>

        <!-- Modal Publication -->
        <div id="publicationOfflineModal" class="modal fade" role="dialog" style="z-index:1200">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">We are sorry, we can't provide you the resource yet ...</h4>
                    </div>
                    <div class="modal-body">
                        We are sorry, the paper and dataset related to this study are not available yet.<br><br>

                        The preprint version will be available on <a href="https://arxiv.org/" target="_blank">ArXiV.org</a> platform soon.<br>
                        The final version of this study will be published in <b>open access</b> if it is accepted through peer reviewing.<br><br>

                        <b>The dataset can not be downloaded yet</b>, we are currently under an authorisation review process with our legal department.<br><br>

                        For any question or request, the authors can be contacted at the following addresses:<br><br>

                        <ul style="padding-left:40px;">
                            <li style="list-style-type:disc;"><a href="mailto:jonathan.dekhtiar@utc.fr" target="_blank">jonathan.dekhtiar@utc.fr</a></li>
                            <li style="list-style-type:disc;"><a href="mailto:alexandre.durupt@utc.fr" target="_blank">alexandre.durupt@utc.fr</a></li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
