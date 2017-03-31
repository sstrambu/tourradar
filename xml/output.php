<?php

/**
 * Class Output
 */
class Output
{
    /**
     * @var string
     */
    protected static $fileName = 'output.csv';

    /**
     * @param $array
     */
    public static function writeArray($array)
    {
        $fp = fopen(self::$fileName, 'w');

        $header = true;
        foreach ($array as $item) {
            if($header) {
                fputcsv($fp, $item->getHeaders());
                $header = false;
            }
            fputcsv($fp, (array) $item);
        }

        fclose($fp);
    }
}