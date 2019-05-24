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

    header( "Last-Modified: " . gmdate( "D, d M Y H:i:s") . " GMT");
    header( "Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
    header( "Cache-Control: post-check=0, pre-check=0", false);
    header( "Pragma: no-cache"); // HTTP/1.0
    header( "Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

    $part_name = isset($_GET['part_name']) ? $_GET['part_name'] : '';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DMU-Net 3D Viewer</title>

        <meta name='Keywords' content='WebGl,pythonOCC,dataset,manufacturing,STEP,JT,AP242,DeepLearning'>
        <meta charset="utf-8">

        <meta Http-Equiv="Cache" content="no-cache">
        <meta Http-Equiv="Pragma-Control" content="no-cache">
        <meta Http-Equiv="Cache-directive" Content="no-cache">
        <meta Http-Equiv="Expires" Content="0">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/86/three.min.js"></script>
        
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/three.js/86/three.js"></script>
        <script type="text/javascript" src="js/OrbitControls.js"></script>

        <script src="js/Detector.js"></script>
        <script src="js/OBJLoader.js"></script>
        <script src="js/MTLLoader.js"></script>

        <style>
            body {
                overflow: hidden;
                margin: 0;
                padding: 0;
                background: rgb(240, 240, 240);
            }

            p {
                margin: 0;
                padding: 0;
            }
            .top-left,
            .left,
            .right {
                position: absolute;
                color: #000;
                font-family: Geneva, sans-serif;
            }

            .top-left {
                top: 1em;
                left: 1em;
                text-align: left;
                border: thin solid white;
                padding: 10px;
                max-width: 300px;
                max-height: 300px;
                overflow: auto;
                white-space: nowrap;
                display: block;

            }

            .left {
                bottom: 1em;
                left: 1em;
                text-align: left;
            }

            .right {
                top: 0;
                right: 0;
                text-align: right;
            }

            a {
                color: #f58231;
            }

            #assembly_list{
                font-size: 12px;
                list-style-type: none;
            }
            
            #bg-loader{
                background: white;
                width: 100vw;
                height: 100vh;
                z-index: 100;
                position: relative;
            }
            
            
            #loader {
              position: absolute;
              left: 50%;
              top: 50%;
              z-index: 1;
              width: 150px;
              height: 150px;
              margin: -75px 0 0 -75px;
              border: 16px solid #f3f3f3;
              border-radius: 50%;
              border-top: 16px solid #3498db;
              width: 120px;
              height: 120px;
              -webkit-animation: rotate 2s linear infinite;
              animation: rotate 2s linear infinite;
            }

            @keyframes rotate {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            @-webkit-keyframes rotate  {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
            }

            @-moz-keyframes rotate {
                0% {-moz-transform:  rotate(0deg); }
                100% {-moz-transform:  rotate(360deg); }
            }

            @-o-keyframes rotate {
                0% {-moz-transform: rotate(0deg);}
                100% {-moz-transform: rotate(360deg);}
            }

            @keyframes rotate {
                0% {transform: rotate(0deg);}
                100% {transform: rotate(360deg);}
            }

            #myProgress {
                width: 100%;
                background-color: grey;
                margin-top: 50vh;
                transform: translateY(-50%);
            }
            #myBar {
                width: 1%;
                height: 30px;
                background-color: green;
                text-align: center;
                line-height: 30px;
                color: white;
            }
            #progress_mask {
                width: 90vw;
                height: 100vh;
                z-index: 9999;
                padding-left: 5vw;
            }
        </style>

    </head>
    <body>

        <div id="bg-loader"><div id="loader"></div></div>
        <div id="progress_mask" style="display:none;"><div id="myProgress"><div id="myBar">0%</div></div></div>
        <div id="container" style="display:none;"></div>

        <div class="top-left">
            <p><b>Hide/Show Sub-Assemblies:</b><p>
            <ul id="assembly_list"></ul>
        </div>
        
        <script>

            window.onload = function() {
                setTimeout(function(){
                    var el = document.getElementById("loader");
                    el.parentNode.removeChild( el );
                    
                    var el = document.getElementById("bg-loader");
                    el.parentNode.removeChild( el );

                    document.getElementById("progress_mask").style.display = "block";
                }, 0);
            }

            /* Moving the progress bar of the CAD model */

            function updateProgressBar(progress){

                var elem = document.getElementById("myBar");
                var progress = parseInt(progress);

                console.log( progress + '% loaded' );

                if (progress >= 100) {
                    var el = document.getElementById("progress_mask");
                    el.parentNode.removeChild( el );
                    document.getElementById("container").style.display = "block";
                } else {
                    elem.style.width = progress + '%';
                    elem.innerHTML = progress * 1  + '%';
                }
            }
        </script>

        <script>

            if (!Detector.webgl) {
                Detector.addGetWebGLMessage();
            }

            var container;

            var camera, controls, scene, renderer;
            var lighting, ambient, keyLight, fillLight, backLight;

            var windowHalfX = window.innerWidth / 2;
            var windowHalfY = window.innerHeight / 2;

            init();
            animate();

            function init() {

                container = document.createElement('div');
                document.body.appendChild(container);

                /* Camera */

                camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 99999999);
                camera.position.z = 3;

                // Convert camera fov degrees to radians
                var fov = camera.fov * ( Math.PI / 180 );

                /* Scene */

                scene = new THREE.Scene();
                lighting = false;

                ambient = new THREE.AmbientLight(0xffffff, 1.0);
                scene.add(ambient);

                keyLight = new THREE.DirectionalLight(new THREE.Color('hsl(282, 0%, 50%)'), 1.0);
                keyLight.position.set(-100, 0, 100);

                fillLight = new THREE.DirectionalLight(new THREE.Color('hsl(282, 0%, 82%)'), 0.4);
                fillLight.position.set(100, 0, 100);

                backLight = new THREE.DirectionalLight(0xffffff, 1.0);
                backLight.position.set(100, 0, -100).normalize();

                /* Model */

                var mtlLoader = new THREE.MTLLoader();
                <?php 
                    echo "mtlLoader.setTexturePath('dataset/".$part_name."/');"; 
                    echo "mtlLoader.setPath('dataset/".$part_name."/');"; 
                ?>
                mtlLoader.load('shape.mtl', function (materials) {

                    materials.preload();

                    var objLoader = new THREE.OBJLoader();
                    objLoader.setMaterials(materials);
                    
                    <?php echo "objLoader.setPath('dataset/".$part_name."/');"; ?>
                    objLoader.load('shape.obj', 
                        function (object) {

                            object.traverse( function ( child ) {
                                if ( child instanceof THREE.Mesh ) {

                                    // ========== Adding the assembly to the list  ==========

                                    var list = document.getElementById('assembly_list');
                                    var entry = document.createElement('li');

                                    var checkbox = document.createElement('input');
                                    checkbox.type = "checkbox";
                                    checkbox.checked = true;
                                    checkbox.id = child.uuid;
                                    checkbox.setAttribute('data-id', child.id);
                                    checkbox.className = "AssemblyGroupCheckbox";
                                    checkbox.onclick = function() {
                                        var obj_tmp = scene.getObjectById( Number(this.getAttribute('data-id')), true );
                                        if (this.checked) {
                                            obj_tmp.visible = true;
                                        } else {
                                            obj_tmp.visible = false;
                                        }

                                    };
                                    entry.appendChild(checkbox);

                                    var label = document.createElement('label')
                                    label.htmlFor = child.uuid;
                                    label.appendChild(document.createTextNode(str_cleaning(child.name)));
                                    entry.appendChild(label);

                                    list.appendChild(entry);
                                }
                            } );
                            
                            var bbox = new THREE.Box3().setFromObject(object);
                            
                            aspect = 80 / 60;
                            
                            var boundingBox_center = bbox.min;
                                
                            boundingBox_center.x = (bbox.max.x + bbox.min.x)/2;
                            boundingBox_center.y = (bbox.max.y + bbox.min.y)/2;
                            boundingBox_center.z = (bbox.max.z + bbox.min.z)/2;
                            
                            radius = Math.sqrt(Math.pow(boundingBox_center.x - bbox.max.x, 2) + Math.pow(boundingBox_center.y - bbox.max.y, 2) + Math.pow(boundingBox_center.z - bbox.max.z, 2));
                            distanceFactor = Math.abs( aspect * radius / Math.sin( camera.fov/2 ));
                            
                            camera.position.set( 0, 0, distanceFactor);

                            var centerVector = scene.position;
                            object.position.x -= boundingBox_center.x;
                            object.position.y -= boundingBox_center.y;
                            object.position.z -= boundingBox_center.z;
                            
                            scene.add(object);

                            scene.rotateX(Math.random()*360);
                            scene.rotateY(Math.random()*360);
                            scene.rotateZ(Math.random()*360);
                            
                        },
                        // Function called when download progresses
                        function ( xhr ) {
                            updateProgressBar(xhr.loaded / xhr.total * 100);
                        },
                        // Function called when download errors
                        function ( xhr ) {
                            console.log( 'An error happened' );
                        }
                    );

                });

                /* Renderer */

                renderer = new THREE.WebGLRenderer();
                renderer.setPixelRatio(window.devicePixelRatio);
                renderer.setSize(window.innerWidth, window.innerHeight);
                renderer.setClearColor(new THREE.Color("rgb(250, 250, 250)"));

                container.appendChild(renderer.domElement);

                /* Controls */

                controls = new THREE.OrbitControls(camera, renderer.domElement);
                controls.enableDamping = true;
                controls.dampingFactor = 0.25;
                controls.enableZoom = true;
                controls.enableRotate = true;
                controls.enablePan = false;

                /* Events */

                window.addEventListener('resize', onWindowResize, false);

                ambient.intensity = 0.25;
                scene.add(keyLight);
                scene.add(fillLight);
                scene.add(backLight);

            }

            function onWindowResize() {

                windowHalfX = window.innerWidth / 2;
                windowHalfY = window.innerHeight / 2;

                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();

                renderer.setSize(window.innerWidth, window.innerHeight);

            }

            function onKeyboardEvent(e) {

                if (e.code === 'KeyL') {

                    lighting = !lighting;

                    if (lighting) {

                        ambient.intensity = 0.25;
                        scene.add(keyLight);
                        scene.add(fillLight);
                        scene.add(backLight);

                    } else {

                        ambient.intensity = 1.0;
                        scene.remove(keyLight);
                        scene.remove(fillLight);
                        scene.remove(backLight);

                    }

                }

            }

            function animate() {

                requestAnimationFrame(animate);

                controls.update();

                render();

            }

            function render() {

                renderer.render(scene, camera);

            }

            var latin_map = {"Á":"A","Ă":"A","Ắ":"A","Ặ":"A","Ằ":"A","Ẳ":"A","Ẵ":"A","Ǎ":"A","Â":"A","Ấ":"A","Ậ":"A","Ầ":"A","Ẩ":"A","Ẫ":"A","Ä":"A","Ǟ":"A","Ȧ":"A","Ǡ":"A","Ạ":"A","Ȁ":"A","À":"A","Ả":"A","Ȃ":"A","Ā":"A","Ą":"A","Å":"A","Ǻ":"A","Ḁ":"A","Ⱥ":"A","Ã":"A","Ꜳ":"AA","Æ":"AE","Ǽ":"AE","Ǣ":"AE","Ꜵ":"AO","Ꜷ":"AU","Ꜹ":"AV","Ꜻ":"AV","Ꜽ":"AY","Ḃ":"B","Ḅ":"B","Ɓ":"B","Ḇ":"B","Ƀ":"B","Ƃ":"B","Ć":"C","Č":"C","Ç":"C","Ḉ":"C","Ĉ":"C","Ċ":"C","Ƈ":"C","Ȼ":"C","Ď":"D","Ḑ":"D","Ḓ":"D","Ḋ":"D","Ḍ":"D","Ɗ":"D","Ḏ":"D","ǲ":"D","ǅ":"D","Đ":"D","Ƌ":"D","Ǳ":"DZ","Ǆ":"DZ","É":"E","Ĕ":"E","Ě":"E","Ȩ":"E","Ḝ":"E","Ê":"E","Ế":"E","Ệ":"E","Ề":"E","Ể":"E","Ễ":"E","Ḙ":"E","Ë":"E","Ė":"E","Ẹ":"E","Ȅ":"E","È":"E","Ẻ":"E","Ȇ":"E","Ē":"E","Ḗ":"E","Ḕ":"E","Ę":"E","Ɇ":"E","Ẽ":"E","Ḛ":"E","Ꝫ":"ET","Ḟ":"F","Ƒ":"F","Ǵ":"G","Ğ":"G","Ǧ":"G","Ģ":"G","Ĝ":"G","Ġ":"G","Ɠ":"G","Ḡ":"G","Ǥ":"G","Ḫ":"H","Ȟ":"H","Ḩ":"H","Ĥ":"H","Ⱨ":"H","Ḧ":"H","Ḣ":"H","Ḥ":"H","Ħ":"H","Í":"I","Ĭ":"I","Ǐ":"I","Î":"I","Ï":"I","Ḯ":"I","İ":"I","Ị":"I","Ȉ":"I","Ì":"I","Ỉ":"I","Ȋ":"I","Ī":"I","Į":"I","Ɨ":"I","Ĩ":"I","Ḭ":"I","Ꝺ":"D","Ꝼ":"F","Ᵹ":"G","Ꞃ":"R","Ꞅ":"S","Ꞇ":"T","Ꝭ":"IS","Ĵ":"J","Ɉ":"J","Ḱ":"K","Ǩ":"K","Ķ":"K","Ⱪ":"K","Ꝃ":"K","Ḳ":"K","Ƙ":"K","Ḵ":"K","Ꝁ":"K","Ꝅ":"K","Ĺ":"L","Ƚ":"L","Ľ":"L","Ļ":"L","Ḽ":"L","Ḷ":"L","Ḹ":"L","Ⱡ":"L","Ꝉ":"L","Ḻ":"L","Ŀ":"L","Ɫ":"L","ǈ":"L","Ł":"L","Ǉ":"LJ","Ḿ":"M","Ṁ":"M","Ṃ":"M","Ɱ":"M","Ń":"N","Ň":"N","Ņ":"N","Ṋ":"N","Ṅ":"N","Ṇ":"N","Ǹ":"N","Ɲ":"N","Ṉ":"N","Ƞ":"N","ǋ":"N","Ñ":"N","Ǌ":"NJ","Ó":"O","Ŏ":"O","Ǒ":"O","Ô":"O","Ố":"O","Ộ":"O","Ồ":"O","Ổ":"O","Ỗ":"O","Ö":"O","Ȫ":"O","Ȯ":"O","Ȱ":"O","Ọ":"O","Ő":"O","Ȍ":"O","Ò":"O","Ỏ":"O","Ơ":"O","Ớ":"O","Ợ":"O","Ờ":"O","Ở":"O","Ỡ":"O","Ȏ":"O","Ꝋ":"O","Ꝍ":"O","Ō":"O","Ṓ":"O","Ṑ":"O","Ɵ":"O","Ǫ":"O","Ǭ":"O","Ø":"O","Ǿ":"O","Õ":"O","Ṍ":"O","Ṏ":"O","Ȭ":"O","Ƣ":"OI","Ꝏ":"OO","Ɛ":"E","Ɔ":"O","Ȣ":"OU","Ṕ":"P","Ṗ":"P","Ꝓ":"P","Ƥ":"P","Ꝕ":"P","Ᵽ":"P","Ꝑ":"P","Ꝙ":"Q","Ꝗ":"Q","Ŕ":"R","Ř":"R","Ŗ":"R","Ṙ":"R","Ṛ":"R","Ṝ":"R","Ȑ":"R","Ȓ":"R","Ṟ":"R","Ɍ":"R","Ɽ":"R","Ꜿ":"C","Ǝ":"E","Ś":"S","Ṥ":"S","Š":"S","Ṧ":"S","Ş":"S","Ŝ":"S","Ș":"S","Ṡ":"S","Ṣ":"S","Ṩ":"S","Ť":"T","Ţ":"T","Ṱ":"T","Ț":"T","Ⱦ":"T","Ṫ":"T","Ṭ":"T","Ƭ":"T","Ṯ":"T","Ʈ":"T","Ŧ":"T","Ɐ":"A","Ꞁ":"L","Ɯ":"M","Ʌ":"V","Ꜩ":"TZ","Ú":"U","Ŭ":"U","Ǔ":"U","Û":"U","Ṷ":"U","Ü":"U","Ǘ":"U","Ǚ":"U","Ǜ":"U","Ǖ":"U","Ṳ":"U","Ụ":"U","Ű":"U","Ȕ":"U","Ù":"U","Ủ":"U","Ư":"U","Ứ":"U","Ự":"U","Ừ":"U","Ử":"U","Ữ":"U","Ȗ":"U","Ū":"U","Ṻ":"U","Ų":"U","Ů":"U","Ũ":"U","Ṹ":"U","Ṵ":"U","Ꝟ":"V","Ṿ":"V","Ʋ":"V","Ṽ":"V","Ꝡ":"VY","Ẃ":"W","Ŵ":"W","Ẅ":"W","Ẇ":"W","Ẉ":"W","Ẁ":"W","Ⱳ":"W","Ẍ":"X","Ẋ":"X","Ý":"Y","Ŷ":"Y","Ÿ":"Y","Ẏ":"Y","Ỵ":"Y","Ỳ":"Y","Ƴ":"Y","Ỷ":"Y","Ỿ":"Y","Ȳ":"Y","Ɏ":"Y","Ỹ":"Y","Ź":"Z","Ž":"Z","Ẑ":"Z","Ⱬ":"Z","Ż":"Z","Ẓ":"Z","Ȥ":"Z","Ẕ":"Z","Ƶ":"Z","Ĳ":"IJ","Œ":"OE","ᴀ":"A","ᴁ":"AE","ʙ":"B","ᴃ":"B","ᴄ":"C","ᴅ":"D","ᴇ":"E","ꜰ":"F","ɢ":"G","ʛ":"G","ʜ":"H","ɪ":"I","ʁ":"R","ᴊ":"J","ᴋ":"K","ʟ":"L","ᴌ":"L","ᴍ":"M","ɴ":"N","ᴏ":"O","ɶ":"OE","ᴐ":"O","ᴕ":"OU","ᴘ":"P","ʀ":"R","ᴎ":"N","ᴙ":"R","ꜱ":"S","ᴛ":"T","ⱻ":"E","ᴚ":"R","ᴜ":"U","ᴠ":"V","ᴡ":"W","ʏ":"Y","ᴢ":"Z","á":"a","ă":"a","ắ":"a","ặ":"a","ằ":"a","ẳ":"a","ẵ":"a","ǎ":"a","â":"a","ấ":"a","ậ":"a","ầ":"a","ẩ":"a","ẫ":"a","ä":"a","ǟ":"a","ȧ":"a","ǡ":"a","ạ":"a","ȁ":"a","à":"a","ả":"a","ȃ":"a","ā":"a","ą":"a","ᶏ":"a","ẚ":"a","å":"a","ǻ":"a","ḁ":"a","ⱥ":"a","ã":"a","ꜳ":"aa","æ":"ae","ǽ":"ae","ǣ":"ae","ꜵ":"ao","ꜷ":"au","ꜹ":"av","ꜻ":"av","ꜽ":"ay","ḃ":"b","ḅ":"b","ɓ":"b","ḇ":"b","ᵬ":"b","ᶀ":"b","ƀ":"b","ƃ":"b","ɵ":"o","ć":"c","č":"c","ç":"c","ḉ":"c","ĉ":"c","ɕ":"c","ċ":"c","ƈ":"c","ȼ":"c","ď":"d","ḑ":"d","ḓ":"d","ȡ":"d","ḋ":"d","ḍ":"d","ɗ":"d","ᶑ":"d","ḏ":"d","ᵭ":"d","ᶁ":"d","đ":"d","ɖ":"d","ƌ":"d","ı":"i","ȷ":"j","ɟ":"j","ʄ":"j","ǳ":"dz","ǆ":"dz","é":"e","ĕ":"e","ě":"e","ȩ":"e","ḝ":"e","ê":"e","ế":"e","ệ":"e","ề":"e","ể":"e","ễ":"e","ḙ":"e","ë":"e","ė":"e","ẹ":"e","ȅ":"e","è":"e","ẻ":"e","ȇ":"e","ē":"e","ḗ":"e","ḕ":"e","ⱸ":"e","ę":"e","ᶒ":"e","ɇ":"e","ẽ":"e","ḛ":"e","ꝫ":"et","ḟ":"f","ƒ":"f","ᵮ":"f","ᶂ":"f","ǵ":"g","ğ":"g","ǧ":"g","ģ":"g","ĝ":"g","ġ":"g","ɠ":"g","ḡ":"g","ᶃ":"g","ǥ":"g","ḫ":"h","ȟ":"h","ḩ":"h","ĥ":"h","ⱨ":"h","ḧ":"h","ḣ":"h","ḥ":"h","ɦ":"h","ẖ":"h","ħ":"h","ƕ":"hv","í":"i","ĭ":"i","ǐ":"i","î":"i","ï":"i","ḯ":"i","ị":"i","ȉ":"i","ì":"i","ỉ":"i","ȋ":"i","ī":"i","į":"i","ᶖ":"i","ɨ":"i","ĩ":"i","ḭ":"i","ꝺ":"d","ꝼ":"f","ᵹ":"g","ꞃ":"r","ꞅ":"s","ꞇ":"t","ꝭ":"is","ǰ":"j","ĵ":"j","ʝ":"j","ɉ":"j","ḱ":"k","ǩ":"k","ķ":"k","ⱪ":"k","ꝃ":"k","ḳ":"k","ƙ":"k","ḵ":"k","ᶄ":"k","ꝁ":"k","ꝅ":"k","ĺ":"l","ƚ":"l","ɬ":"l","ľ":"l","ļ":"l","ḽ":"l","ȴ":"l","ḷ":"l","ḹ":"l","ⱡ":"l","ꝉ":"l","ḻ":"l","ŀ":"l","ɫ":"l","ᶅ":"l","ɭ":"l","ł":"l","ǉ":"lj","ſ":"s","ẜ":"s","ẛ":"s","ẝ":"s","ḿ":"m","ṁ":"m","ṃ":"m","ɱ":"m","ᵯ":"m","ᶆ":"m","ń":"n","ň":"n","ņ":"n","ṋ":"n","ȵ":"n","ṅ":"n","ṇ":"n","ǹ":"n","ɲ":"n","ṉ":"n","ƞ":"n","ᵰ":"n","ᶇ":"n","ɳ":"n","ñ":"n","ǌ":"nj","ó":"o","ŏ":"o","ǒ":"o","ô":"o","ố":"o","ộ":"o","ồ":"o","ổ":"o","ỗ":"o","ö":"o","ȫ":"o","ȯ":"o","ȱ":"o","ọ":"o","ő":"o","ȍ":"o","ò":"o","ỏ":"o","ơ":"o","ớ":"o","ợ":"o","ờ":"o","ở":"o","ỡ":"o","ȏ":"o","ꝋ":"o","ꝍ":"o","ⱺ":"o","ō":"o","ṓ":"o","ṑ":"o","ǫ":"o","ǭ":"o","ø":"o","ǿ":"o","õ":"o","ṍ":"o","ṏ":"o","ȭ":"o","ƣ":"oi","ꝏ":"oo","ɛ":"e","ᶓ":"e","ɔ":"o","ᶗ":"o","ȣ":"ou","ṕ":"p","ṗ":"p","ꝓ":"p","ƥ":"p","ᵱ":"p","ᶈ":"p","ꝕ":"p","ᵽ":"p","ꝑ":"p","ꝙ":"q","ʠ":"q","ɋ":"q","ꝗ":"q","ŕ":"r","ř":"r","ŗ":"r","ṙ":"r","ṛ":"r","ṝ":"r","ȑ":"r","ɾ":"r","ᵳ":"r","ȓ":"r","ṟ":"r","ɼ":"r","ᵲ":"r","ᶉ":"r","ɍ":"r","ɽ":"r","ↄ":"c","ꜿ":"c","ɘ":"e","ɿ":"r","ś":"s","ṥ":"s","š":"s","ṧ":"s","ş":"s","ŝ":"s","ș":"s","ṡ":"s","ṣ":"s","ṩ":"s","ʂ":"s","ᵴ":"s","ᶊ":"s","ȿ":"s","ɡ":"g","ᴑ":"o","ᴓ":"o","ᴝ":"u","ť":"t","ţ":"t","ṱ":"t","ț":"t","ȶ":"t","ẗ":"t","ⱦ":"t","ṫ":"t","ṭ":"t","ƭ":"t","ṯ":"t","ᵵ":"t","ƫ":"t","ʈ":"t","ŧ":"t","ᵺ":"th","ɐ":"a","ᴂ":"ae","ǝ":"e","ᵷ":"g","ɥ":"h","ʮ":"h","ʯ":"h","ᴉ":"i","ʞ":"k","ꞁ":"l","ɯ":"m","ɰ":"m","ᴔ":"oe","ɹ":"r","ɻ":"r","ɺ":"r","ⱹ":"r","ʇ":"t","ʌ":"v","ʍ":"w","ʎ":"y","ꜩ":"tz","ú":"u","ŭ":"u","ǔ":"u","û":"u","ṷ":"u","ü":"u","ǘ":"u","ǚ":"u","ǜ":"u","ǖ":"u","ṳ":"u","ụ":"u","ű":"u","ȕ":"u","ù":"u","ủ":"u","ư":"u","ứ":"u","ự":"u","ừ":"u","ử":"u","ữ":"u","ȗ":"u","ū":"u","ṻ":"u","ų":"u","ᶙ":"u","ů":"u","ũ":"u","ṹ":"u","ṵ":"u","ᵫ":"ue","ꝸ":"um","ⱴ":"v","ꝟ":"v","ṿ":"v","ʋ":"v","ᶌ":"v","ⱱ":"v","ṽ":"v","ꝡ":"vy","ẃ":"w","ŵ":"w","ẅ":"w","ẇ":"w","ẉ":"w","ẁ":"w","ⱳ":"w","ẘ":"w","ẍ":"x","ẋ":"x","ᶍ":"x","ý":"y","ŷ":"y","ÿ":"y","ẏ":"y","ỵ":"y","ỳ":"y","ƴ":"y","ỷ":"y","ỿ":"y","ȳ":"y","ẙ":"y","ɏ":"y","ỹ":"y","ź":"z","ž":"z","ẑ":"z","ʑ":"z","ⱬ":"z","ż":"z","ẓ":"z","ȥ":"z","ẕ":"z","ᵶ":"z","ᶎ":"z","ʐ":"z","ƶ":"z","ɀ":"z","ﬀ":"ff","ﬃ":"ffi","ﬄ":"ffl","ﬁ":"fi","ﬂ":"fl","ĳ":"ij","œ":"oe","ﬆ":"st","ₐ":"a","ₑ":"e","ᵢ":"i","ⱼ":"j","ₒ":"o","ᵣ":"r","ᵤ":"u","ᵥ":"v","ₓ":"x"};

            function str_cleaning( tmp_str ){
                rslt = "";
                for (var i = 0, len = tmp_str.length; i < len; i++) {
                    char = tmp_str[i];

                    if (char.charCodeAt(0) != 65533)
                        rslt += latin_map[char] ? latin_map[char] : char;

                }
                return rslt;

            }

        </script>

    </body>
</html>
