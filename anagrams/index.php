<?php

/**
 * @param $string1
 * @param $string2
 * @return bool
 */
function isAnagram($string1, $string2)
{
    $sumString1 = $sumString2 = $letterPosition = 0;

    if (is_string($string1) && is_string($string2)) {
        $string1 = getCleanString($string1);
        $string2 = getCleanString($string2);

        while ($string1[$letterPosition]) {
            $sumString1 += ord($string1[$letterPosition]);
            $sumString2 += ord($string2[$letterPosition]);
            $letterPosition++;
        }
    }

    return ($string1 == $string2 || ($sumString1 == $sumString2 && $sumString1 > 0));
}

/**
 * @param $string
 * @return mixed
 */
function getCleanString($string)
{
    return preg_replace('/[^A-Za-z0-9]/', '', strtolower($string));
}