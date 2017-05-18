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

?>

        <footer class="container">
            <div class="footer-bottom">
                <p style="color: #464646; font-weight: 500;">
                    <br>Developed by <a href="http://www.jonathandekhtiar.eu/" target="_blank">Jonathan DEKHTIAR</a> 
                    - 2017 - 
                    <a href="https://www.utc.fr/en.html" target="_blank">University of Technology of Compiègne</a>.
                </p>
            </div>
        </footer><!-- footer -->

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <?php
            if ($filename == "explore.php"){
                echo '<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-treegrid/0.2.0/js/jquery.treegrid.min.js"></script>';
                echo '<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-treegrid/0.2.0/js/jquery.treegrid.bootstrap3.min.js"></script>';
                echo '<script type="text/javascript" src="js/explorer.js"></script>';
            }
        ?>

        <script>
            function scrollTo(selector) {
                if (selector == "#"){
                    $('html, body').animate({scrollTop: 0}, 'slow');
                }
                else{
                    var destination = $(selector);
                    $('html, body').animate({scrollTop: destination.offset().top}, 'slow');
                }
            }

            $(".nav > li > a").bind("click", function() {
                scrollTo($(this).attr('href'));
                return false;
            });

            $(".navbar-brand").bind("click", function() {
                scrollTo($(this).attr('href'));
                return false;
            });

        </script>

    </body>
</html>
