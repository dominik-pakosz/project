<?php

interface EpisodeInterface
{
    /**
     * @param int $season Season number.
     * @param int $number Episode number.
     * @param float $rating Episode rating.
     * @param string $title Episode title.
     */
    public function __construct($season, $number, $rating, $title);
    
    /**
     * Returns season number.
     * 
     * @return int
     */
    public function getSeason();
    
    /**
     * Returns episode number.
     * 
     * @return int
     */
    public function getNumber();
    
    /**
     * Returns weighted arithmetic mean of episode ratings.
     * 
     * @return float
     */
    public function getRating();
    
    /**
     * Returns episode title.
     * 
     * @return string
     */
    public function getTitle();
}
