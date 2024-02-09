<?php

namespace Recutils;

class Recutils
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function insert()
    {
        return new Recins($this->file);
    }

    public function select()
    {
        return new Recsel($this->file);
    }

    public function delete()
    {
        return new Recdel($this->file);
    }

    public function update()
    {
        return new Recset($this->file);
    }
}