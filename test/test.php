<?php

require_once __DIR__ . './../vendor/autoload.php';

use Orchestrator\CNAB\LineBuilder;
use Orchestrator\CNAB\FileBuilder;
$cnab = new LineBuilder();

$cnab->insertFloat('1.12', 1, 3, '0' ); // Código da Empresa
$cnab->insertField('0000', 4, 7, '0' ); // Lote de Serviço
$cnab->insertField('0', 8, 8, '0' ); // Tipo de Registro
$cnab->insertField('', 9, 17, ' '); // Brancos
$cnab->insertField('2', 18, 18, '0'); // Tipo de Inscrição
$cnab->insertField('1234567891234', 19, 32, '0'); // Número de Inscrição
$cnab->insertField('CONTRATO123456789', 33, 52, ' ', STR_PAD_RIGHT); // Convênio/Contrato
$cnab->insertField('Minha Empresa LTDA', 53, 102, ' ', STR_PAD_RIGHT); // Nome da Empresa
$cnab->nextLine();

$file = $cnab->getLine();

$cnab->insertField('001', 1, 3, '0' ); // Código da Empresa
$cnab->insertField('0000', 4, 7, '0' ); // Lote de Serviço
$cnab->insertField('0', 8, 8, '0' ); // Tipo de Registro
$cnab->insertField('', 9, 17, ' '); // Brancos
$cnab->insertField('2', 18, 18, '0'); // Tipo de Inscrição
$cnab->insertField('12345678901234', 19, 32, '0'); // Número de Inscrição
$cnab->insertField('CONTRATO123456789', 33, 52, ' ', STR_PAD_RIGHT); // Convênio/Contrato
$cnab->insertField('Minha Empresa LTDA', 53, 102, ' ', STR_PAD_RIGHT); // Nome da Empresa
$cnab->nextLine();

$file .= $cnab->getLine();

echo $file;