<?php
declare(strict_types=1);


namespace Classes\Operations;

use Classes\Elements\Line;
use Classes\Elements\Matrix;

abstract class Operation
{
    /**
     * @var Matrix
     */
    protected $matrix;

    /**
     * @var int
     */
    protected $indexBeingAffected;

    public function __construct(Matrix $matrix, int $indexBeingAffected)
    {
        $this->matrix = $matrix;
        $this->indexBeingAffected = $indexBeingAffected;
    }

    /**
     * Executa a operação
     */
    public abstract function execute();

    /**
     * Devolve o resultado da operação
     */
    public abstract function getResult(): Line;

    /**
     * @return Matrix
     */
    public function getResultInMatrix(): Matrix
    {
        $matrixCopy = $this->matrix;
        $matrixCopy->setLine($this->getResult(), $this->indexBeingAffected);
        echo "\n";
				$this->getResult()->print();
				echo "\n";
        return $matrixCopy;
    }

    /**
     * Aplica o resultado da operação na matriz passada
     */
    public function applyOnMatrix()
    {
        $this->matrix->setLine($this->getResult(), $this->indexBeingAffected);
    }
}