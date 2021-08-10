<?php
declare(strict_types=1);


namespace Classes\Operations;

use Classes\Elements\Line;
use Classes\Elements\Matrix;
use Exception;

/**
 * Class MultiplyLineThenSum
 * @package Classes\Operations
 */
class MultiplyLineThenSum extends MultiplyLine
{
    /**
     * @var Line
     */
    protected $receiverLine;

		/**
		 * MultiplyLineThenSum constructor.
		 * @param Matrix $matrix
		 * @param Line $receiverLine
		 * @param Line $lineToMultiply
		 * @param int $multiplier
		 * @throws Exception
		 */
    public function __construct(Matrix $matrix, Line $receiverLine, Line $lineToMultiply, int $multiplier)
    {
        $this->receiverLine = $receiverLine;
        parent::__construct(
            $matrix,
						$lineToMultiply,
            $multiplier
        );
    }

		/**
		 * Executa a operação
		 * @throws Exception
		 */
		public function execute()
    {
        parent::execute();
        $sum = new SumLines($this->matrix, $this->lineToMultiply, $this->receiverLine);
        $sum->execute();
        $this->result = $sum->getResult();
    }

		/**
		 * @return string
		 */
		public function getLogLine(): string
		{
				$affectedLine = $this->indexBeingAffected;
				$multipliedLine = $this->lineToMultiply->getIndex();
				$multiplier = $this->multiplier;

				return "L$affectedLine = (L$multipliedLine x $multiplier) + L$affectedLine";
		}
}