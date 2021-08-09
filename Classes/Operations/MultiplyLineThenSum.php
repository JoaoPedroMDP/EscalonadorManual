<?php
declare(strict_types=1);


namespace Classes\Operations;

use Classes\Elements\Line;
use Classes\Elements\Matrix;

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
     * @param Line $indexToMultiply
     * @param int $multiplier
     */
    public function __construct(Matrix $matrix,Line $receiverLine, Line $indexToMultiply, int $multiplier)
    {
        $this->receiverLine = $receiverLine;
        parent::__construct(
            $matrix,
            $indexToMultiply,
            $multiplier
        );
    }

    public function execute()
    {
        parent::execute();
        $sum = new SumLines($this->matrix, $this->receiverLine, $this->lineToMultiply);
        $sum->execute();
        $this->result = $sum->getResult();
    }
}