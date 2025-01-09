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

    public function insertFloat($value, int $start, int $end, string $padding = ' ', int $padType = STR_PAD_LEFT): void
    {
        if (is_null($value) || trim($value) === '') {
            $value = '0.00';
        } else {
            $pontuacao = preg_replace('/[0-9]/', '', $value);
            $locale = (mb_substr($pontuacao, -1, 1) === ',') ? "pt-BR" : "en-US";
        
            $formatter = new \NumberFormatter($locale, \NumberFormatter::DECIMAL);
            $parsedValue = $formatter->parse($value, \NumberFormatter::TYPE_DOUBLE);
        
            $value = ($parsedValue === false || $parsedValue == 0) ? '0.00' : number_format($parsedValue, 2, '.', '');
        }
        
        $value = preg_replace('/[^0-9]/', '', $value);   
        
        $this->insertField($value, $start, $end, $padding, $padType);
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