<?php
declare(strict_types=1);

namespace Classes\Operations;

use Classes\Elements\Line;
use Classes\Elements\Matrix;
use Exception;

/**
 * Class SubtractLines
 * @package Classes\Operations
 */
class SubtractLines extends SumLines
{
		/**
		 * SumLines constructor.
		 * @param Matrix $matrix
		 * @param Line $incomingLine
		 * @param Line $receiverLine
		 * @throws Exception
		 */
		public function __construct(Matrix $matrix, Line $incomingLine, Line $receiverLine)
		{
				$this->incomingLine = new Line($incomingLine->getIndex(), $incomingLine->toArray());
				$this->incomingLine->invertElementsSignal();

				$this->receiverLine = $receiverLine;

				parent::__construct($matrix, $this->incomingLine, $this->receiverLine);
		}
}