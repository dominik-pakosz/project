<?php

interface SeriesInterface
{
    public function __construct(Iterator $episodes);
    
    /**
     * Returns best rated episode for specified $season number.
     * 
     * @param int $season
     */
    public function getBestInSeason($season);
    
    /**
     * Returns best rated season finale episode.
     */
    public function getBestSeasonFinale();
    
    /**
     * Returns array of episodes starting with $letter.
     * 
     * @param string $letter
     */
    public function getByTitleFirstLetter($letter);
}
