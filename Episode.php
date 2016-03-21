<?php
require_once 'EpisodeInterface.php';
/**
 * Created by PhpStorm.
 * User: pakoo
 * Date: 14.03.16
 * Time: 14:22
 */
class Episode implements EpisodeInterface
{
    private $season;
    private $number;
    private $rating;
    private $title;

    public function __construct($season, $number, $rating, $title)
    {
        $this->season=$season;
        $this->number=$number;
        $this->rating=$rating;
        $this->title=$title;
    }

    public function getSeason()
    {
        return $this->season;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
