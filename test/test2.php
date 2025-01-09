<?php

require_once __DIR__ . './../vendor/autoload.php';

use Orchestrator\CNAB\LineBuilder;

$cnab = new LineBuilder();

$cnab->insertFloat('1056', 1, 15, '0'); // Código da Empresa

echo $cnab->getLine();


// 000000010000000