<?php

/**
 * Created by PhpStorm.
 * User: pakoo
 * Date: 14.03.16
 * Time: 14:47
 */
class CsvAdapter implements Iterator
{
    private $index;
    private $csvDate;
    public function __construct($path_to_file)
    {
        $this->csvDate = array_map('str_getcsv', file($path_to_file));
        $this->index = 1;
    }

    public function current()
    {
        return $this->csvDate[$this->index];
    }
    public function key()
    {
        return $this->index;
    }
    public function next()
    {
        if($this->index < sizeof($this->csvDate)) {
            $this->index++;
        }
    }
    public function rewind()
    {
        $this->index = 1;
    }
    public function valid()
    {
        return isset($this->csvDate[$this->index]);
    }
}