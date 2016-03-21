<?php
require_once 'SeriesInterface.php';
/**
 * Created by PhpStorm.
 * User: pakoo
 * Date: 14.03.16
 * Time: 14:29
 */
class Series implements SeriesInterface
{
    private $obj;

    public function __construct(Iterator $episodes)
    {
        $this->obj = $episodes;
    }

    public function getBestInSeason($season)
    {
        $best_score = 0;
        $episode_name = '';
        while ($this->obj->valid()) {
            $episode_dates = $this->obj->current();

            $score_temp = $this->bestScore($episode_dates);

            if ($score_temp > $best_score && $episode_dates[0] == $season) {
                $best_score = $score_temp;
                $episode_name = $episode_dates[12];
            }

            $this->obj->next();
        }
        $this->obj->rewind();
        return $episode_name;
    }

    public function getBestSeasonFinale()
    {
        $best_sf = 0;
        $ep_name = '';
        while ($this->obj->valid()) {
            $episode_dates = $this->obj->current();

            $score_temp = $this->bestScore($episode_dates);

            if ($score_temp > $best_sf && $episode_dates[1] == 25) {
                $best_sf = $score_temp;
                $ep_name = $episode_dates[12];
            }

            $this->obj->next();
        }

        $this->obj->rewind();
        return $ep_name;
    }

    public function getByTitleFirstLetter($letter)
    {
        $letter = strtoupper($letter);
        $episodes_array = array();
        //var_dump($episodes_array);
        while ($this->obj->valid()) {
            $c = $this->obj->current();
            //var_dump($c);
            if ($c[12][3] == $letter) {
                array_push($episodes_array, $c[12]);
            }
            $this->obj->next();
        }
        $this->obj->rewind();
        return $episodes_array;
    }

    private function bestScore(array $episode_dates)
    {
        return ($episode_dates[2] * 10 + $episode_dates[3] * 9 + $episode_dates[4] * 8 + $episode_dates[5] * 7 +
            $episode_dates[6] * 6 + $episode_dates[7] * 5 + $episode_dates[8] * 4 + $episode_dates[9] * 3 +
            $episode_dates[10] * 2 + $episode_dates[11] * 1) / ($episode_dates[2] + $episode_dates[3] + $episode_dates[4] +
            $episode_dates[5] + $episode_dates[6] + $episode_dates[7] + $episode_dates[8] + $episode_dates[9] +
            $episode_dates[10] + $episode_dates[11]);
    }

}
