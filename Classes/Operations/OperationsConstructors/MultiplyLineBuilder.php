<?php
declare(strict_types=1);


namespace Classes\Operations\OperationsConstructors;


use Classes\Elements\Matrix;
use Classes\Operations\MultiplyLine;
use Classes\Operations\Operation;
use Classes\Outputs\Output;

class MultiplyLineBuilder extends OperationBuilder
{
		/**
		 * @param Matrix $matrix
		 * @return MultiplyLine
		 */
		public function build(Matrix $matrix): MultiplyLine
    {
        $this->printInstructions(self::class);
        Output::getData("a posição da linha a ser multiplicada");
        $lineToBeMultipliedIndex = $this->getNatural();

        Output::getData("o multiplicador");
        $multiplier = $this->getNatural();

        return new MultiplyLine(
            $matrix,
            $this->matrix->getLineFromUserInput($lineToBeMultipliedIndex),
            $multiplier
        );
    }
}