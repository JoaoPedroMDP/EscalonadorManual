<?php
declare(strict_types=1);


namespace Classes\Operations\OperationsConstructors;


use Classes\Elements\Matrix;
use Classes\InputParsers\InputGetter;
use Classes\Operations\Operation;
use Classes\Outputs\Output;

abstract class OperationBuilder extends InputGetter
{
    /**
     * @var Matrix
     */
    protected $matrix;

    public function __construct(Matrix &$matrix)
    {
        $this->matrix = $matrix;
    }

		/**
		 * @param Matrix $matrix
		 */
		public abstract function build(Matrix $matrix);

    protected function printInstructions(string $class)
    {
        Output::operationInstructions($class);
    }
}