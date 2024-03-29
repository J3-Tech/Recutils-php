<?php

namespace Recutils;

/**
 * @method Option setOutput(string $output)
 * @method Option getListExtractors()
 * @method Option getExtractorDescriptions()
 * @method Option setUserAgent(string $userAgent)
 * @method Option dumpUserAgent()
 */
class Option
{
    protected $options = [];

    public function __call(string $method, mixed $args): Option
    {
        $cleanMethod = lcfirst(preg_replace('/get|set/', '', $method));
        if (preg_match_all('/[A-Z]/', $cleanMethod, $uppers)) {
            foreach (current($uppers) as $key => $upper) {
                $cleanMethod = str_replace($upper, '-'.strtolower($upper), $cleanMethod);
            }
        }
        $this->options[$cleanMethod] = current($args) ? current($args) : null;

        return $this;
    }

    public function format(): array
    {
        $output = [];
        foreach ($this->options as $key => $option) {
            $output[] = "-{$key[0]}";
            $output[] = $option;
        }

        return $output;
    }
}
