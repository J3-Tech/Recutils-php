<?php

require_once __DIR__.'/../vendor/autoload.php';

use Recutils\Recutils;

$recutils = new Recutils('./test.rec');
$insert = $recutils->insert();
$insert->getOption()->setField('test')->setValue('testing');
$insert->execute();