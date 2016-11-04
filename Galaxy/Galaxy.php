<?php
namespace Galaxy;

define('Galaxy\WORLD_WIDTH', 1000);
define('Galaxy\WORLD_HEIGHT', 800);
define('Galaxy\WORLD_DEPTH', 100);

class Galaxy
{

    private $worlds = 50;
    private $worldSize = 10;
    private $galaxy = [];

    private function createCoords() {
        $coords = [];
        $coords['x'] = mt_rand(0, WORLD_WIDTH);
        $coords['y'] = mt_rand(0, WORLD_HEIGHT);
        $coords['z'] = mt_rand(1, WORLD_DEPTH);

        return $coords;
    }

    public function setCoords() {
        for ($i = 0; $i < $this->worlds; $i++) {
            do {
                $coords = $this->createCoords();
            } while (!$this->isValidCoords($coords));

            $this->galaxy[$i]['x'] = $coords['x'];
            $this->galaxy[$i]['y'] = $coords['y'];
            $this->galaxy[$i]['z'] = $coords['z'];
        }
    }

    /**
     * Determines if new coordinates are same as existing coordinates
     *
     * @return Boolean True if the new coordinates are acceptable
     */
    private function isValidCoords($coords) {
        for ($i = 0; $i < count($this->galaxy); $i++) {
            $existing = $this->galaxy[$i]['x'] + $this->galaxy[$i]['y'] + $this->galaxy[$i]['z'];
            $proposed = $coords['x'] + $coords['y'] + $coords['z'];

            if (abs($existing - $proposed) < 20) {
                return false;
            }
        }
        return true;
    }

    /**
     * Reads a text file and returns available color codes
     *
     * @return Array Returns array of r, g, b values
     */
    public function readColors() {
        $url = "star-colors.txt";
        $handle;
        $colors = [];

        $handle = fopen($url, "r");
        if ($handle) {
            $i = 0;
            while (($buffer = fgets($handle, 1024)) !== false) {
                $values = explode(',', trim($buffer));
                list($r, $g, $b) = $values;
                $colors[$i]['r'] = $r;
                $colors[$i]['g'] = $g;
                $colors[$i]['b'] = $b;
                $i++;
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);

            return $colors;
        }
        throw new Exception("Color file can't be opened.");
    }

    public function setColors() {
        $palette = $this->readColors();

        for ($i = 0; $i < $this->worlds; $i++) {
            $randColor = mt_rand(1, count($palette) - 1);
            error_log($randColor);
            $color['r'] = $palette[$randColor]['r'];
            $color['g'] = $palette[$randColor]['g'];
            $color['b'] = $palette[$randColor]['b'];

            $this->galaxy[$i]['colors'] = $color;
        }
    }

    public function getGalaxies() {
        echo(json_encode($this->galaxy));
    }
}
