<?php


/**
 * Class Input
 */
class Input
{
    /**
     * @param $input
     * @return mixed
     */
    public static function getDOMFromXML($input)
    {
        $xmlDoc = new DOMDocument();
        $xmlDoc->loadXML($input);
        return $xmlDoc->getElementsByTagName('TOUR');
    }

}