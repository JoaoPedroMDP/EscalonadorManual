<?php
declare(strict_types=1);

namespace Classes\Operations\OperationsConstructors;

use Classes\Elements\Matrix;
use Classes\Operations\SubtractLines;
use Classes\Outputs\Output;
use Exception;

/**
 * Class SubtractLinesBuilder
 */
class SubtractLinesBuilder extends OperationBuilder
{
		/**
		 * @throws Exception
		 */
		public function build(Matrix $matrix): SubtractLines
		{
				$this->printInstructions(self::class);
				Output::getData("a posição da linha de origem");
				$originLine = $this->getNatural();

				Output::getData("a posição da linha de destino");
				$targetLine = $this->getNatural();

				return new SubtractLines(
						$matrix,
						$matrix->getLineFromUserInput($originLine),
						$matrix->getLineFromUserInput($targetLine)
				);
		}
}