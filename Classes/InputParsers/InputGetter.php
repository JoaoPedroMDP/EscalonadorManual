<?php
declare(strict_types=1);


namespace Classes\InputParsers;


class InputGetter
{
    /**
     * @return int
     */
    public function getNatural()
    {
        $digit = $this->getChar();
        if(!is_numeric($digit))
        {
            echo "Namoral vei? Era só digitar um numero, qual a dificuldade nisso, aff";
            die;
        }
        return intval($digit);
    }

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
    public function getChar()
    {
        $this->flushSTDIN();
        return fgetc(STDIN);
    }

    /**
     * @return string
     */
    public function getLine()
    {
        $this->flushSTDIN();
        return readline();
    }
}