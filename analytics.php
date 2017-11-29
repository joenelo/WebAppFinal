<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<h1>Number of times photos were clicked.</h1>
<div>
    <ul>
        <li>Turtle: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("turtle", $_SESSION["thingData"])){
                echo $counts['turtle'];
            }
            ?>
        </li>

        <li>Tiger: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("tiger", $_SESSION["thingData"])){
                echo $counts['tiger'];
            }
            ?>
        </li>
        <li>Gorilla: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("gorilla", $_SESSION["thingData"])){
                echo $counts['gorilla'];
            }
            ?>
        </li>
        <li>Lion: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("lion", $_SESSION["thingData"])){
                echo $counts['lion'];
            }
            ?>
        </li>
        <li>Great White: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("greatwhite", $_SESSION["thingData"])){
                echo $counts['greatwhite'];
            }
            ?>
        </li>
        <li>Great-Australian-Walks: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("greatwhite", $_SESSION["thingData"])){
                echo $counts['greatwhite'];
            }
            ?>
        </li>
        <li>Hawaii: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("Great-Australian-Walks", $_SESSION["thingData"])){
                echo $counts['Great-Australian-Walks'];
            }
            ?>
        </li>
        <li>Napali Coast: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("napalicoast", $_SESSION["thingData"])){
                echo $counts['napalicoast'];
            }
            ?>
        </li>
        <li>Tahiti: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("tahati", $_SESSION["thingData"])){
                echo $counts['tahati'];
            }
            ?>
        </li>
        <li>Waves: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("waves", $_SESSION["thingData"])){
                echo $counts['waves'];
            }
            ?>
        </li>
        <li>Mt Robson: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("mtrobson", $_SESSION["thingData"])){
                echo $counts['mtrobson'];
            }
            ?>
        </li>
        <li>Nebula: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("nebula", $_SESSION["thingData"])){
                echo $counts['nebula'];
            }
            ?>
        </li>
        <li>Aurora: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("aurora", $_SESSION["thingData"])){
                echo $counts['aurora'];
            }
            ?>
        </li>
        <li>China: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("china", $_SESSION["thingData"])){
                echo $counts['china'];
            }
            ?>
        </li>
        <li>Underwater: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("underwater", $_SESSION["thingData"])){
                echo $counts['underwater'];
            }
            ?>
        </li>
        <li>Snake: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("snake", $_SESSION["thingData"])){
                echo $counts['snake'];
            }
            ?>
        </li>
        <li>Gecko: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("gecko", $_SESSION["thingData"])){
                echo $counts['gecko'];
            }
            ?>
        </li>
        <li>Chameleon: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("chameleon", $_SESSION["thingData"])){
                echo $counts['chameleon'];
            }
            ?>
        </li>
        <li>Iguana: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("iguana", $_SESSION["thingData"])){
                echo $counts['iguana'];
            }
            ?>
        </li>
        <li>Komodo: <?php
            $counts = array_count_values($_SESSION["thingData"]);
            if(in_array("komodo", $_SESSION["thingData"])){
                echo $counts['komodo'];
            }
            ?>
        </li>
    </ul>
</div>

</body>
</html>