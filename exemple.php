<?php

class CNABFileBuilder
{
    private string $line;

    public function __construct(int $length = 240)
    {
        // Inicializa a linha com espaços no tamanho especificado
        $this->line = str_repeat(' ', $length);
    }

    public function insertField(string $value, int $start, int $end, string $padding = ' ', int $padType = STR_PAD_LEFT): void
    {
        $start = $start - 1; 
        $end = $end - 1;

        $length = $end - $start + 1;

        $formattedValue = str_pad(substr($value, 0, $length), $length, $padding, $padType);

        $this->line = substr_replace($this->line, $formattedValue, $start, $length);
    }

    public function getLine(): string
    {
        return $this->line;
    }

    public function resetLine(int $length = 240): void
    {
        // Reinicializa a linha com espaços
        $this->line = str_repeat(' ', $length);
    }
}

$cnab = new CNABFileBuilder();

$cnab->insertField('001', 1, 3, '0' ); // Código da Empresa
$cnab->insertField('0000', 4, 7, '0' ); // Lote de Serviço
$cnab->insertField('0', 8, 8, '0' ); // Tipo de Registro
$cnab->insertField('', 9, 17, ' '); // Brancos
$cnab->insertField('2', 18, 18, '0'); // Tipo de Inscrição
$cnab->insertField('12345678901234', 19, 32, '0'); // Número de Inscrição
$cnab->insertField('CONTRATO123456789', 33, 52, ' ', STR_PAD_RIGHT); // Convênio/Contrato
$cnab->insertField('Minha Empresa LTDA', 53, 102, ' ', STR_PAD_RIGHT); // Nome da Empresa

echo $cnab->getLine();
