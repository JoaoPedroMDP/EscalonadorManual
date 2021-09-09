<?php
declare(strict_types=1);


namespace Classes\Operations\OperationsConstructors;


use Classes\Elements\Matrix;
use Classes\InputParsers\Number;
use Classes\Operations\MultiplyLineThenSum;
use Classes\Outputs\Output;
use Exception;

/**
 * Class MultiplyLineThenSumBuilder
 * @package Classes\Operations\OperationsConstructors
 */
class MultiplyLineThenSumBuilder extends OperationBuilder
{

		/**
		 * @throws Exception
		 */
		public function build(Matrix $matrix): MultiplyLineThenSum
		{
        $this->printInstructions(self::class);
        Output::getData("a posição da Linha A");


        $lineToMultiplyIndex = $this->getNatural();
        Output::getData("a posição da Linha B");

        $receiverLineIndex = $this->getNatural();

        Output::getData("o multiplicador da linha A");
        $number = new Number();
        $number->buildFromInput();

        return new MultiplyLineThenSum(
            $matrix,
            $this->matrix->getLineFromUserInput($receiverLineIndex),
            $this->matrix->getLineFromUserInput($lineToMultiplyIndex),
            $number->getNumber()
        );
    }
}