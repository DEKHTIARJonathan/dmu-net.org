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
    require_once "parts/header.php";
?>
    <a href="https://github.com/DEKHTIARJonathan/dmu-net.org" target="_blank">
        <img style="position: absolute; top: 0; right: 0; border: 0; z-index: 9999;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png">
    </a>

    <!-- header -->
    <div class="container content">
        <section id="banner">
            <div class="banner-text text-center">
                <h1>DMU-Net Dataset</h1>
                <p>
                    A research dataset of Engineering CAD Models to enable Computer Vision and Deep Machine Learning Applications
                    in the engineering and manufacturing industry.
                </p>
            </div><!-- banner text -->
            <div class="row vertical-align">
                <div class="col-md-12">
                
                    <div class="col-md-6">
                        
                            <div class="row">
                                <div class="col-md-12" style="padding-bottom:40px;">
                                    <div class="col-md-4" style="text-align: center;">
                                        <img src="img/logos/logo_UE.png" style="height:70px;">
                                    </div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <img src="img/logos/Logo_Europe_Sengage.jpg" style="height:70px;">
                                    </div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <img src="img/logos/logo_Haut2France.jpg" style="height:70px;">
                                    </div>
                                </div>
                                
                                <div class="col-md-12" style="padding-bottom:40px;">
                                    <div class="col-md-4" style="text-align: center;">
                                        <img src="img/logos/logosUTC_SU.png" style="height:70px;">
                                    </div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <img src="img/logos/EPFL-Logo.png" style="height:70px;">
                                    </div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <img src="img/logos/DeltaCAD-logo.png" style="height:70px;">
                                    </div>
                                </div>
                                
                                <div class="col-md-12" style="text-align:center;">
                                    <a href="/explore.php" class="btn btn-large">Explore the dataset</a>
                                </div>
                                
                            </div>
                    </div>
                    
                    <div class="col-md-4">
                        <img src='img/engine-banner.png' style="max-width:100%; max-height:100%">
                    </div>
                </div>
            </div>
        </section>

        <section id="citation" class="features section" style="padding-bottom:0px;">
            <div class="container">
                <h3>If you are using the dataset, please consider citing the following:</h3>

                <p style="padding:20px 0px;">
                  DEKHTIAR Jonathan, DURUPT Alexandre, BRICOGNE Matthieu, EYNARD Benoit, ROWSON Harvey and KIRITSIS Dimitris (2017). <br>
                  Deep Machine Learning for Big Data Engineering Applications - Survey, Opportunities and Case Study.
                </p>

                <pre style="margin-bottom:30px;">@article {DEKHTIAR2017:DMUNet,
    author = {DEKHTIAR, Jonathan and DURUPT, Alexandre and BRICOGNE, Matthieu and EYNARD, Benoit and ROWSON, Harvey and KIRITSIS, Dimitris},
    title  = {Deep Machine Learning for Big Data Engineering Applications - Survey, Opportunities and Case Study},
    month  = {jan},
    year   = {2017}
}</pre>
                <p>
                  Links :
                    <a href="#" data-toggle="modal" data-target="#publicationOfflineModal">Publication</a> |
                    <a href="#" data-toggle="modal" data-target="#publicationOfflineModal">Bibtex</a> |
                    <a href="#" data-toggle="modal" data-target="#publicationOfflineModal">pre-print on arxiv.org</a>
                </p>
            </div>
        </section><!-- citation -->

    </div>
    
    <!-- Modal Publication -->
    <div id="publicationOfflineModal" class="modal fade" role="dialog">
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

    <?php
        require_once "parts/footer.php";
    ?>
