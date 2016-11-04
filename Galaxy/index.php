<?php
namespace Galaxy;
/*
 * This is the ajax endpoint for handling requests
 */

require_once("Galaxy.php");

$galaxy = new Galaxy();
$colors = $galaxy->readColors();

/*
 * Build the stars
 */
$galaxy->setCoords();

/*
 * Assign color to each star/planet
 */
$galaxy->setColors();

/*
 * Return the data to the client
 */
$galaxy->getGalaxies();

?>
