<?php

namespace Orchestrator\CNAB;

class LineBuilder
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

    public function nextLine(): void
    {
        $this->line .= PHP_EOL;
    }
}