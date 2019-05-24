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

    require_once "parts/header.php";
?>

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

                    <div class="col-md-8">

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
    title   = {Deep learning for big data applications in CAD and PLM – Research review, opportunities and case study},
    author  = {Jonathan Dekhtiar and Alexandre Durupt and Matthieu Bricogne and Benoit Eynard and Harvey Rowson and Dimitris Kiritsis},
    journal = {Computers in Industry},
    volume  = {100},
    pages   = {227 - 243},
    year    = {2018},
    issn    = {0166-3615},
    doi     = {https://doi.org/10.1016/j.compind.2018.04.005},
    url     = {http://www.sciencedirect.com/science/article/pii/S0166361517305560}
}</pre>
                <p>
                  Links :
                    <a href="https://www.sciencedirect.com/science/article/pii/S0166361517305560" target="_blank">Publication</a> |
                    <a href="https://www.sciencedirect.com/sdfe/arp/cite?pii=S0166361517305560&format=text%2Fx-bibtex&withabstract=true" target="_blank">Bibtex</a>
                </p>
            </div>
        </section><!-- citation -->

    </div>

    <?php
        require_once "parts/footer.php";
    ?>
