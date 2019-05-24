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
                    A research dataset of Engineering Computer-Aided Design (CAD) Models to enable Computer Vision and Deep Machine Learning Applications
                    in the engineering and manufacturing industry.
                </p>
            </div><!-- banner text -->
        </section>

        <section id="Overview" class="features section" style="padding:0px;">
            <div class="container">
                <h3>Overview</h3>

                <p style="padding:20px 0px;">
                    Welcome to the DMU-Net project! DMU-Net is an ongoing research effort to provide researchers around the world an easily accessible CAD Models database. On this page, you will find some useful information about the dataset, the DMU-Net community, and the background of this project. Please feel free to contact us if you have comments or questions. We'd love to hear from researchers on ideas to improve DMU-Net.
                </p>

            </div>
        </section><!-- Overview -->

        <section id="what" class="features section" style="padding:0px;">
            <div class="container">
                <h3>What is DMU-Net?</h3>

                <p style="padding:20px 0px;">
                    DMU-Net is a dataset of industrial CAD Model. The dataset is composed of 954 models formated with the industry standard <a href="http://www.steptools.com/stds/step/step_1.html" target="_blank">STEP</a> (STandard for the Exchange of Product model data), <a href="http://www.steptools.com/stds/step/step_2.html" target="_blank">Application Protocol (AP) 203</a>,  defined in the norm <a href="https://www.iso.org/standard/44305.html" target="_blank">ISO 10303-203:2011</a>.
                    <br><br>
                    With DMU-Net, we aim to provide 50 different part-categories in a near future and on average 80 CAD models to illustrate each category. CAD Models of each category are quality-controlled and human-annotated.
                </p>

            </div>
        </section><!-- What is ImageNet -->

        <section id="why" class="features section" style="padding:0px;">
            <div class="container">
                <h3>Why ImageNet?</h3>

                <p style="padding:20px 0px;">
                    The DMU-Net project is inspired by a tradition coming from the computer vision research community. Datasets such as <a href="http://image-net.org/" target="_blank">ImageNet</a>, <a href="https://www.shapenet.org/" target="_blank">ShapeNet</a>, <a href="http://host.robots.ox.ac.uk/pascal/VOC/" target="_blank">PASCAL VOC</a>, <a href="http://yann.lecun.com/exdb/mnist/" target="_blank">MNIST</a>, <a href="https://research.google.com/youtube8m/" target="_blank">Youtube-8M</a> greatly helped and keep helping researchers to push the boundaries and tackle industrial challenges. In line with the Big Data phenomenon and the need for more data, DMU-Net aims to remove the data collection barrier by providing every researchers who wants to work toward addressing research issues that require a large amount of industrial data coming from the manufacturing industry.
                    <br><br>
                    However, good research needs good resource. To tackle these problems at a large-scale (with central industrial CAD repositories, quantities engineering documents, document versioning, etc.), it would be tremendously helpful to researchers if there exists a large-scale CAD Models database. This is the motivation for us to put together DMU-Net. We hope it will become a useful resource to our research community, as well as anyone whose research and education would benefit from using a large CAD Models database.
                </p>

            </div>
        </section><!-- Why ImageNet -->

        <section id="why" class="features section" style="padding:0px;">
            <div class="container">
                <h3>Who can use DMU-Net?</h3>

                <p style="padding:20px 0px;">
                    We envision DMU-Net as a useful resource to researchers in the academic world, as well as educators around the world.
                </p>

            </div>
        </section><!-- Who uses ImageNet -->

        <section id="why" class="features section" style="padding:0px;">
            <div class="container">
                <h3>Do we own the CAD Models inside DMU-Net? Can I download them ?</h3>

                <p style="padding:20px 0px;">
                   We do not own the copyright of the CAD Models.  The STEP CAD Models are available for researchers and educators who wish to use the images for non-commercial research and/or educational purposes, we can provide access through our site under only this conditions and terms.
                </p>

            </div>
        </section><!-- Does DMU-Net own the CAD Models ? Can I download them ? -->

        <section id="why" class="features section" style="padding:0px; padding-bottom: 40px;">
            <div class="container">
                <h3>How can I contribute to the project ?</h3>

                <p style="padding:20px 0px;">
                    In line with the Open-Source and Open-Research principals, DMU-Net is fully open to contribution via pull-request on our Github Repositories:
                    <ul style="padding-left:40px; font-size: 16px;">
                        <li style="list-style-type:disc; padding-bottom:10px;">Website - Repository: <a href="https://github.com/DEKHTIARJonathan/dmu-net.org" target="_blank">DEKHTIARJonathan/dmu-net.org</a></li>
                        <li style="list-style-type:disc;">STEP to ThreeJS Converter - Repository: <a href="https://github.com/DEKHTIARJonathan/dmu-net.org/tree/STEP-2-ThreeJS-BatchConverter" target="_blank">DEKHTIARJonathan/dmu-net.org - Branch: STEP-2-ThreeJS-BatchConverter</a></li>
                    </ul>
                </p>

            </div>
        </section><!-- Does DMU-Net own the CAD Models ? Can I download them ? -->

    </div>

    <?php
        require_once "parts/footer.php";
    ?>
