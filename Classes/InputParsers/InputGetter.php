<?php
declare(strict_types=1);


namespace Classes\InputParsers;


/**
 * Class InputGetter
 * @package Classes\InputParsers
 */
class InputGetter
{

    /**
     * @return int
     */
    public function getNatural(): int
		{
        $digit = $this->getChar();
        if(!is_numeric($digit))
        {
            echo "Namoral vei? Era só digitar um numero, qual a dificuldade nisso, aff";
            die;
        }
        return intval($digit);
    }

		/**
		 * Limpa o buffer de entrada
		 */
		protected function flushSTDIN()
    {
        $in = [STDIN];
        $out = [];
        $oob = [];
        while(stream_select($in, $out, $oob,0)){
            fgetc(STDIN);
        }
    }

    /**
     * @return string
     */
    public function getChar(): string
		{
        $this->flushSTDIN();
        return fgetc(STDIN);
    }

    /**
     * @return string
     */
    public function getLine(): string
		{
        $this->flushSTDIN();
        return readline();
    }
}