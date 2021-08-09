<?php
declare(strict_types=1);


namespace Classes\Operations\OperationsConstructors;


use Classes\Elements\Matrix;
use Classes\InputParsers\Number;
use Classes\Operations\MultiplyLineThenSum;
use Classes\Outputs\Output;

class MultiplyLineThenSumBuilder extends OperationBuilder
{

    public function build(Matrix $matrix)
    {
        $this->printInstructions(self::class);
        Output::getData("a posição da Linha A");


        $lineToMultiplyIndex = $this->getNatural();
        Output::getData("a posição da Linha B");

        $receiverLineIndex = $this->getNatural();

        Output::getData("o multiplicador da linha A");
        $number = new Number();
        $number->getNumberFromInput();

        return new MultiplyLineThenSum(
            $matrix,
            $this->matrix->getLineFromUserInput($receiverLineIndex),
            $this->matrix->getLineFromUserInput($lineToMultiplyIndex),
            $number->getNumber()
        );
    }
}