<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" type="text/css" href="galaxy.css">
</head>

<body style="background-color:#000">

<div class="content-container">
    <?php



    // for ($i=0; $i<$worlds; $i++) {
    //     $size = floor($worldSize - ($galaxy[$i]['z'] / ($depth / $worldSize)) + 1);
    //     $randColor = mt_rand(1, count($colors) - 1);

    //     /* PLANETS */
    //     /* background-color:rgb(".$colors[$randColor]['r'].",".$colors[$randColor]['g'].",".$colors[$randColor]['b']."); */
    //     //echo("<div class='world' id='*".$i."' style='position:absolute;z-index:".(100 - $galaxy[$i]['z']).";top:".$galaxy[$i]['y']."px;left:".$galaxy[$i]['x']."px;width:".$size."px;height:".$size."px;border-radius:".floor($size/2)."px;margin-right:1px;background: radial-gradient(at top left, rgba(".$colors[$randColor]['r'].",".$colors[$randColor]['g'].",".$colors[$randColor]['b'].", 1.0), rgba(0,0,0, 1.0));color:#fff;font-size:9px;text-align:center'></div>");

    //     /* STARS */
    //     $blur = floor($size / 2) + 1;
    //     $shadow = floor($size / 3);
    //     $title = 'Star '.$i.': ['.$galaxy[$i]['x'].','.$galaxy[$i]['y'].','.$galaxy[$i]['z'].']';
    //     $rgb = $colors[$randColor]['r'] . ',' . $colors[$randColor]['g'] . ',' . $colors[$randColor]['b'];
    //     echo("<div class='world' title='".$title."' id='*".$i."' style='position:absolute;z-index:".(100 - $galaxy[$i]['z']).";top:".$galaxy[$i]['y']."px;left:".$galaxy[$i]['x']."px;width:".$size."px;height:".$size."px;border-radius:".floor($size/2)."px;margin-right:1px;background:radial-gradient(circle rgba(255, 255, 255, 1.0) 50%, rgba(".$rgb.", 1.0) 50%); box-shadow: 0px 0px ".$blur."px ".$shadow."px rgba(".$rgb.", 0.7); color:#fff;font-size:9px;text-align:center'></div>");
    // }


    ?>
</div>
<div class="world-list">
    <?php
    // for ($i = 0; $i < $worlds; $i++) {
    //     echo "<div>World " . $i . ": x = " . $galaxy[$i]['x'] . ", y = " . $galaxy[$i]['y'] . ", z = " . $galaxy[$i]['z'] . "</div>";
    // }
    ?>
</div>
<div id="planet" class="planet-info"></div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script>
"use strict";

$(document).ready(function() {
    $.ajax({
        url: "Galaxy/index.php"
    }).done(function(response) {
        console.log(JSON.stringify(response));
    });
});

</script>
</body>
</html>
