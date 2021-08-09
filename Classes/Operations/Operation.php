<?php
declare(strict_types=1);


namespace Classes\Operations;

use Classes\Elements\Line;
use Classes\Elements\Matrix;
use Classes\Loggers\Loggable;
use Exception;

/**
 * Class Operation
 * @package Classes\Operations
 */
abstract class Operation extends Loggable
{
    /**
     * @var Matrix
     */
    protected $matrix;

    /**
     * @var int
     */
    protected $indexBeingAffected;

		/**
		 * @param Matrix $matrix
		 * @param int $indexBeingAffected
		 * @throws Exception
		 */
		public function __construct(Matrix $matrix, int $indexBeingAffected)
    {
        $this->matrix = $matrix;
        $this->indexBeingAffected = $indexBeingAffected;
				parent::__construct();
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
        return $matrixCopy;
    }

    /**
     * Aplica o resultado da operação na matriz passada
     */
    public function applyOnMatrix()
    {
    		$this->log($this->matrix, $this->getLogLine(), $this->getResultInMatrix());
        $this->matrix->setLine($this->getResult(), $this->indexBeingAffected);
    }
}