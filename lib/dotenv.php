<?php

function load_envfile($path)
{
    $file = fopen($path, 'r') or die('Unable to open file!');

    while (!feof($file)) {
        $line = trim(fgets($file));
        $parts = explode('=', $line);

        if (count($parts) === 2) {
            putenv($line);
        }
    }

    fclose($file);
}

?>