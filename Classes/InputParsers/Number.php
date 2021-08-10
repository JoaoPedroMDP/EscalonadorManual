<?php
declare(strict_types=1);

namespace Classes\InputParsers;

class Number extends InputGetter
{
    /**
     * @var string
     */
    protected $numberAsString;

    /**
     * @var bool
     */
    protected $isNegative;

    /**
     * @return int
     */
    public function getNumber()
    {
        $numberAsInt = intval($this->numberAsString);
        return $this->isNegative ? -1 * $numberAsInt : $numberAsInt;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number)
    {
        $this->numberAsString = $number;
    }

		/**
		 * Adiciona um dígito no número
		 * @param string $digit
		 */
		public function addDigit(string $digit)
    {
        $this->numberAsString .= $digit;
    }

		/**
		 * Inverte o sinal do número
		 */
		public function invertSignal()
    {
        $this->isNegative = !$this->isNegative;
    }

		/**
		 * Pega um número do buffer de entrada
		 */
		public function buildFromInput()
    {
        $input = $this->getLine();

        $arrayedInput = str_split($input);
        if($arrayedInput[0] == "-")
        {
            $this->invertSignal();
            $input = implode('',
                array_slice(
                    $arrayedInput,
                    1,
                )
            );
        }

        $this->setNumber($input);
    }
}