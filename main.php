<?php
declare(strict_types=1);

use Classes\Assertions;
use Classes\Elements\Matrix;
use Classes\Exceptions\EndOfInput;
use Classes\InputParsers\InputGetter;
use Classes\InputParsers\Number;
use Classes\InputParsers\RowOfNumbers;
use Classes\Operations\MultiplyLineThenSum;
use Classes\Operations\Operation;
use Classes\Operations\OperationsConstructors\MultiplyLineBuilder;
use Classes\Operations\OperationsConstructors\MultiplyLineThenSumBuilder;
use Classes\Operations\OperationsConstructors\OperationBuilder;
use Classes\Operations\OperationsConstructors\SumLinesBuilder;
use Classes\Outputs\Output;

include 'autoloader.php';

//Para debugar
function showMatrix(array $matrix)
{
    foreach($matrix as $line => $values){
        foreach($values as $column => $value)
        {
            echo "$value ";
        }
        echo"\n";
    }
    echo"\n";
}
function showArray(array $array)
{
    foreach($array as $element)
    {
        echo "$element ";
    }
    echo "\n";
}

function getMatrix(array $matrix, int $line)
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
function parseInput(string $rawInput)
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


function executeOperation(OperationBuilder $operationBuilder, Matrix $matrix)
{
    $inputGetter = new InputGetter();
    $operation = $operationBuilder->build($matrix);
    $operation->execute();
    $operation->getResultInMatrix()->print();
    Output::areYouSure();
    $wants = $inputGetter->getChar();
    if($wants){
        $operation->applyOnMatrix();
    }
}

function main()
{
    Output::intro();

//    $matrix = new Matrix(getMatrix([], 1));
    $matrix = new Matrix(
        [
            [1,2,3],
            [4,5,6],
            [7,8,9]
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
                $operationBuilder = new MultiplyLineThenSumBuilder($matrix);
                break;
            case '4':
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


        Output::chooseOption();
        $option = $inputGetter->getChar();
    }
}

main();