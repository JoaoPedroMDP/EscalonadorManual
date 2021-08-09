<?php
declare(strict_types=1);


namespace Classes\InputParsers;
use Classes\InputParsers\Number;

class RowOfNumbers
{
    /**
     * @var Number[]
     */
    protected $numbers;

    public function toArray(): array
    {
        $array = [];
        foreach($this->numbers as $number)
        {
            $array[] = $number->getNumber();
        }

        return $array;
    }

    /**
     * @param Number $newNumber
     */
    public function addNumber(\Classes\InputParsers\Number $newNumber)
    {
        $this->numbers[] = $newNumber;
    }
}