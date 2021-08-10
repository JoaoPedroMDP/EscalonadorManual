<?php
declare(strict_types=1);


namespace Classes\Operations\OperationsConstructors;


use Classes\Elements\Matrix;
use Classes\Operations\SumLines;
use Classes\Outputs\Output;
use Exception;

/**
 * Class SumLinesBuilder
 * @package Classes\Operations\OperationsConstructors
 */
class SumLinesBuilder extends OperationBuilder
{
		/**
		 * @throws Exception
		 */
		public function build(Matrix $matrix): SumLines
		{
        $this->printInstructions(self::class);
        Output::getData("a posição da linha de origem");
        $originLine = $this->getNatural();

        Output::getData("a posição da linha de destino");
        $targetLine = $this->getNatural();

        return new SumLines(
            $matrix,
            $this->matrix->getLineFromUserInput($originLine),
            $this->matrix->getLineFromUserInput($targetLine)
        );
    }

}