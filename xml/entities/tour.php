<?php

/**
 * Class Tour
 */
class Tour
{
    /**
     * @var
     */
    protected $title;
    /**
     * @var
     */
    protected $code;
    /**
     * @var
     */
    protected $duration = 0;
    /**
     * @var
     */
    protected $inclusions;
    /**
     * @var
     */
    protected $minPrice = 0;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = html_entity_decode($title);
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getInclusions()
    {
        return $this->inclusions;
    }

    /**
     * @param mixed $inclusions
     */
    public function setInclusions($inclusions)
    {
        $this->inclusions = trim(
            preg_replace('/[\s]+/mu', ' ',
                strip_tags(
                    html_entity_decode($inclusions)
                )
            )
        );
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * @param int $minPrice
     * @param int $discount
     */
    public function setMinPrice($minPrice = 0, $discount = 0)
    {
        if($discount > 0) {
            $minPrice -= $minPrice * ($discount / 100);
        }

        $minPrice = ($this->getMinPrice() > 0) ? min($minPrice, $this->getMinPrice()) : $minPrice;

        $this->minPrice = number_format(
            $minPrice, 2, '.', ''
        );
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return array_map('ucfirst', array_keys(get_object_vars($this)));
    }

}