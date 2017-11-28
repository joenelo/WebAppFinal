<?php
session_start();

?>
<doc type=html>

    <html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="dashStyle.css">
    </head>
    <body>

    <!-- Container for Video Background -->
    <div class="vid-container">
        <video id="video1" class="bgvid" autoplay="false" muted="muted" preload="auto" loop src="video/stars.mp4" type="video/mp4">
        </video>
    <!-- Header -->
        <div class="header">
            <h1>Photos from around the world and beyond</h1>
            <p>The following are photos of things found in our universe, please browse them all.</p>
        </div>

        <!-- Analytics Link -->
        <?php if($_SESSION["user"] == "ADMINISTRATOR") { ?>
            <a id="analyticsLink" href="analytics.php">Analytics</a>
        <?php } ?>


        <!-- Photo Grid -->
        <div class="row">
            <div class="column leftImgs">
                <img onclick="showDetails(this)" data-thing="turtle" class="image" src="images/turtle.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="tiger" class="image" src="images/tiger.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="gorilla" class="image" src="images/gorilla.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="lion" class="image" src="images/lion.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="greatwhite" class="image" src="images/greatwhite.jpg" style="width:100%">

            </div>
            <div class="column leftImgs">
                <img onclick="showDetails(this)" data-thing="Great-Australian-Walks" class="image" src="images/Great-Australian-Walks.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="hawaii" class="image" src="images/hawaii.png" style="width:100%">
                <img onclick="showDetails(this)" data-thing="napalicoast" class="image" src="images/napalicoast.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="tahiti" class="bottom image" src="images/tahiti.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="waves" class="bottom image" src="images/waves.jpg" style="width:100%">

            </div>
            <div class="column rightImgs">
                <img onclick="showDetails(this)" data-thing="mtrobson" class="image" src="images/mtrobson.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="nebula" class="image" src="images/nebula.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="aurora" class="image" src="images/aurora.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="china" class="bottom image" src="images/china.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="underwater" class="bottom image" src="images/underwater.jpg" style="width:100%">
            </div>
            <div class="column rightImgs">
                <img onclick="showDetails(this)" data-thing="snake" class="image" src="images/snake.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="gecko" class="image" src="images/gecko.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="chameleon" class="image" src="images/chameleon.jpg" style="width:100%">
                <img onclick="showDetails(this)" data-thing="iguana" class="bottom image" src="images/iguana.jpg" style="width:100%">d
                <img onclick="showDetails(this)" data-thing="komodo" class="bottom image" src="images/komodo.jpg" style="width:100%">
            </div>
        </div>

        <footer>

        </footer>
    </div>
    <script  src="index.js"></script>
    <script>
        function showDetails(thing) {
            // Get the thing displayed in the image (Ex: a turtle, frog, gorilla, etc).
            var dataThing = thing.getAttribute("data-thing");
            alert(dataThing);

            $.ajax({
                url: 'thingData.php',
                type: 'POST',
                dataType: "json",
                data: {
                    thingData: dataThing
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
    </script>
</body>
</html>