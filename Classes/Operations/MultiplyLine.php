<?php
declare(strict_types=1);

namespace Classes\Operations;

use Classes\Elements\Line;
use Classes\Elements\Matrix;

class MultiplyLine extends Operation
{
    /**
     * @var Line
     */
    protected $lineToMultiply;

    /**
     * @var integer
     */
    protected $multiplier;

    /**
     * @var Line
     */
    protected $result;

    /**
     * MultiplyLine constructor.
     * @param Matrix $matrix
     * @param Line $lineToMultiply
     * @param int $multiplier
     */
    public function __construct(Matrix $matrix, Line $lineToMultiply, int $multiplier)
    {
        $this->lineToMultiply = $lineToMultiply;
        $this->multiplier = $multiplier;
        parent::__construct($matrix, $lineToMultiply->getIndex());
    }

    /**
     * Executa a operação
     */
    public function execute()
    {
        $results = [];
        foreach($this->lineToMultiply->toArray() as $index => $element)
        {
            $results[] = $this->lineToMultiply->getElement($index) * $this->multiplier;
        }

        $this->result = new Line($this->indexBeingAffected, $results);
    }

    /**
     * @return Line
     */
    public function getResult(): Line
    {
        return $this->result;
    }
}