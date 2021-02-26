<?php
namespace config;
class Information
{
    public $dayOff;
    public $openHour;
    public $closeHour;
    public $placeLimit;
    function __construct($dayOff, $openHour, $closeHour, $placeLimit) {
        $this->dayOff= $dayOff;
        $this->openHour= $openHour;
        $this->closeHour= $closeHour;
        $this->placeLimit= $placeLimit;
    }
    // $dayOff = "Sunday";
    // $openHour = 12;
    // $closeHour = 18;
    // $placeLimit = 10;

    /**
     * Get the value of placeLimit
     */ 
    public function getPlaceLimit()
    {
        return $this->placeLimit;
    }

    /**
     * Set the value of placeLimit
     *
     * @return  self
     */ 
    public function setPlaceLimit($placeLimit)
    {
        $this->placeLimit = $placeLimit;

        return $this;
    }

    /**
     * Get the value of closeHour
     */ 
    public function getCloseHour()
    {
        return $this->closeHour;
    }

    /**
     * Set the value of closeHour
     *
     * @return  self
     */ 
    public function setCloseHour($closeHour)
    {
        $this->closeHour = $closeHour;

        return $this;
    }

    /**
     * Get the value of openHour
     */ 
    public function getOpenHour()
    {
        return $this->openHour;
    }

    /**
     * Set the value of openHour
     *
     * @return  self
     */ 
    public function setOpenHour($openHour)
    {
        $this->openHour = $openHour;

        return $this;
    }

    /**
     * Get the value of dayOff
     */ 
    public function getDayOff()
    {
        return $this->dayOff;
    }

    /**
     * Set the value of dayOff
     *
     * @return  self
     */ 
    public function setDayOff($dayOff)
    {
        $this->dayOff = $dayOff;

        return $this;
    }
}
