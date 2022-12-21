<?php

namespace app\utils;

class URI {
    public static function getPath($path) {
        $pos = strpos($path, '?');
        if ($pos === false) {
            return $path;
        }

        return substr($path, 0, $pos);
    }
}

?>