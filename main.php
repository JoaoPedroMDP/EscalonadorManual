<?php
declare(strict_types=1);

use Classes\Assertions;
use Classes\Elements\Matrix;
use Classes\Exceptions\EndOfInput;
use Classes\InputParsers\InputGetter;
use Classes\InputParsers\Number;
use Classes\InputParsers\RowOfNumbers;
use Classes\Operations\OperationsConstructors\MultiplyLineBuilder;
use Classes\Operations\OperationsConstructors\MultiplyLineThenSumBuilder;
use Classes\Operations\OperationsConstructors\OperationBuilder;
use Classes\Operations\OperationsConstructors\SumLinesBuilder;
use Classes\Operations\OperationsConstructors\SubtractLinesBuilder;
use Classes\Outputs\Output;

include 'autoloader.php';

/**
 * @param array $matrix
 * @param int $line
 * @return array
 */
function getMatrix(array $matrix, int $line): array
{
    $input = readline("Linha $line:");
    try{
        $parsedInput = parseInput($input);
    } catch (EndOfInput $e) {
        return $matrix;
    }
    $matrix[] = $parsedInput;

    return getMatrix($matrix, ++$line);
}

/**
 * @param string $rawInput
 * @return array
 * @throws EndOfInput
 */
function parseInput(string $rawInput): array
{
    $arrayedInput = str_split($rawInput);

    $numbers = new RowOfNumbers();
    $newNumber = new Number();
    foreach ($arrayedInput as $char)
    {
        if(is_numeric($char))
        {
            $newNumber->addDigit($char);
        }
        if(Assertions::isLetter($char)){
            if(Assertions::is($char, '-'))
            {
                $newNumber->invertSignal();
            }else{
                $numbers->addNumber($newNumber);
                $newNumber = new Number();
                if(!Assertions::isWhiteSpace($char)){
                    throw new EndOfInput();
                }
            }
        }
    }

    $numbers->addNumber($newNumber);
    return $numbers->toArray();
}


/**
 * @param OperationBuilder $operationBuilder
 * @param Matrix $matrix
 */
function executeOperation(OperationBuilder $operationBuilder, Matrix $matrix)
{
    $inputGetter = new InputGetter();
    $operation = $operationBuilder->build($matrix);
    $operation->execute();
    $operation->getResultInMatrix()->print();
    Output::areYouSure();
    $wants = $inputGetter->getChar();
    if($wants == "Y" || $wants == "y"){
        $operation->applyOnMatrix();
    }
}

/**
 * Entrada do programa
 * @throws Exception
 */
function main()
{
    Output::intro();

//    $matrix = new Matrix(getMatrix([], 1));
    $matrix = new Matrix(
        [
            [1, 1, 1, 1, 2],
            [1,-1,-2,-3, 5],
            [2, 1,-3, 1,-9],
						[3,-1,-1, 1,-6]
        ]
    );

    Output::chooseOption();
    $inputGetter = new InputGetter();
    $option = $inputGetter->getChar();
    $userWantsToExit = false;
    while(!$userWantsToExit)
    {
        $operationBuilder = null;
        switch($option)
        {
            case '1':
                $operationBuilder = new MultiplyLineBuilder($matrix);
                break;
            case '2':
                $operationBuilder = new SumLinesBuilder($matrix);
                break;
						case '3':
								$operationBuilder = new SubtractLinesBuilder($matrix);
								break;
            case '4':
                $operationBuilder = new MultiplyLineThenSumBuilder($matrix);
                break;
            case '5':
                $matrix->print();
                break;
            case 'q':
                Output::goodbye();
                $userWantsToExit = true;
                break;
            default:
                Output::optionNotFound();
                break;
        }

        if(!is_null($operationBuilder))
        {
            executeOperation($operationBuilder, $matrix);
        }

				if(!$userWantsToExit)
				{
						Output::chooseOption();
						$option = $inputGetter->getChar();
				}

		}
}

main();