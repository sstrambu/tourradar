<?php

/**
 * Class Parser
 */
class Parser
{
    /**
     * @param DOMNodeList $toursDOM
     * @return array
     */
    public static function getNodesToTour(DOMNodeList $toursDOM)
    {
        $tours = array();
        foreach ($toursDOM as $tourDOM) {
            $tours[] = self::getNodeToTour($tourDOM);
        }
        return $tours;
    }

    /**
     * @param DOMElement $tourDOM
     * @return Tour
     */
    protected static function getNodeToTour(DOMElement $tourDOM)
    {
        $tour = new Tour();
        foreach ($tourDOM->childNodes as $column) {
            switch($column->nodeName) {
                case 'DEP':
                    $tour->setMinPrice($column->getAttribute("EUR"), (int)$column->getAttribute("DISCOUNT"));
                    break;
                case 'Duration':
                    $tour->setDuration((int) $column->nodeValue);
                    break;
                default:
                    if(method_exists($tour, 'set'.$column->nodeName)) {
                        $tour->{'set'.$column->nodeName}($column->nodeValue);
                    }
                    break;
            }
        }
        return $tour;
    }
}