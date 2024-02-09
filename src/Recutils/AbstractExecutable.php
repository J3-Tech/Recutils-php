<?php

namespace Recutils;

use Symfony\Component\Process\Process;

abstract class AbstractExecutable implements IExecutable
{
    protected $option;
    protected $file;

    public function __construct($file)
    {
        $this->option = new Option();
        $this->file = $file;
    }

    public function getOption()
    {
        return $this->option;
    }

    public function execute(): array
    {
        $commands = array_filter(array_merge([$this->getCommand(), $this->file], $this->option->format()));
        $process = new Process($commands);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new \Exception($process->getErrorOutput());
        }

        return explode("\n", trim($process->getOutput()));
    }
}
