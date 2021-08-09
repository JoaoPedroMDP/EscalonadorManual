<?php
declare(strict_types=1);


namespace Classes\Operations;


use Classes\Elements\Line;
use Classes\Elements\Matrix;

/**
 * Class SumLines
 * @package Classes\Operations
 */
class SumLines extends Operation
{
    /**
     * @var Line
     */
    protected $receiverLine;

    /**
     * @var Line
     */
    protected $incomingLine;

    /**
     * @var Line
     */
    protected $result;

		/**
		 * SumLines constructor.
		 * @param Matrix $matrix
		 * @param Line $incomingLine
		 * @param Line $receiverLine
		 */
		public function __construct(Matrix $matrix, Line $incomingLine, Line $receiverLine)
		{
				$this->receiverLine = $receiverLine;
				$this->incomingLine = $incomingLine;
				parent::__construct($matrix, $receiverLine->getIndex());
		}

		/**
		 * Executa a operação
		 */
		public function execute()
    {
        $results = [];
        foreach($this->receiverLine->toArray() as $key => $element)
        {
            $results[] = $this->incomingLine->getElement($key) + $element;
        }
				$result = new Line($this->indexBeingAffected, $results);
        $this->result = $result;
    }

		/**
     * @return Line
     */
    public function getResult(): Line
		{
        return $this->result;
    }

    public function getLogLine(): string
		{
				$receiverLine = $this->receiverLine->getIndex();
				$incomingLine = $this->incomingLine->getIndex();

				return "L$receiverLine = L$receiverLine +L$incomingLine";
		}
}