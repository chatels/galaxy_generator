<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" type="text/css" href="galaxy.css">
</head>

<body style="background-color:#000">

<div class="content-container"></div>

<div class="world-list"></div>

<div id="planet" class="planet-info"></div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script>
"use strict";

$(document).ready(function() {
    $.ajax({
        url: "Galaxy/index.php"
    }).done(function(response) {
        console.log(response);

        var container = $('.content-container');
        var list = $('.world-list');
        var galaxy = JSON.parse(response);
        var worlds = galaxy.length;

        var size, blur, shadow, title, rgb;
        var worldSize = 10; // change this to be dynamic in PHP
        var depth = 100; // change this also

        for (var i=0; i<worlds; i++) {
            //galaxy = response[i];
            list.append("<div>World " + i + ": x = " + galaxy[i]['x'] + ", y = " + galaxy[i]['y'] + ", z = " + galaxy[i]['z'] + "</div>");

            size = Math.floor(worldSize - (galaxy[i]['z'] / (depth / worldSize)) + 1);
            blur = Math.floor(size / 2) + 1;
            shadow = Math.floor(size / 3);
            title = 'Star '+i+': ['+galaxy[i]['x']+','+galaxy[i]['y']+','+galaxy[i]['z']+']';
            rgb = galaxy[i]['colors']['r'] + ',' + galaxy[i]['colors']['g'] + ',' + galaxy[i]['colors']['b'];
            container.append("<div class='world' title='"+title+"' id='*"+i+"' style='position:absolute;z-index:"+(100 - galaxy[i]['z'])+";top:"+galaxy[i]['y']+"px;left:"+galaxy[i]['x']+"px;width:"+size+"px;height:"+size+"px;border-radius:"+Math.floor(size/2)+"px;margin-right:1px;background:radial-gradient(circle rgba(255, 255, 255, 1.0) 50%, rgba("+rgb+", 1.0) 50%); box-shadow: 0px 0px "+blur+"px "+shadow+"px rgba("+rgb+", 0.7); color:#fff;font-size:9px;text-align:center'></div>");
        }


    });
});

</script>
</body>
</html>
