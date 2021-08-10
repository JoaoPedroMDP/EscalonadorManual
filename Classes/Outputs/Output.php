<?php
declare(strict_types=1);

namespace Classes\Outputs;


use Classes\Operations\OperationsConstructors\MultiplyLineThenSumBuilder;

/**
 * Class Output
 * @package Classes\Outputs
 */
class Output extends HaveColors
{
    public static function intro()
    {
        echo "Insira as linhas da matriz\n";
        echo "Cada elemento deve ser separado por espaço\n";
        echo "Para finalizar a inserção de linhas, insira uma letra para um elemento\n";
    }

    public static function chooseOption()
    {
        echo "Agora, selecione uma opção\n";
        echo "  1) Multiplicar uma linha\n";
        echo "  2) Somar linha A em linha B\n";
        echo "  3) Subtrair linha B de linha A\n";
        echo "  4) Multiplicar A e somar em B\n";
        echo "  5) Mostrar matriz\n";
        echo "  q) Sair do programa\n";
    }

    public static function goodbye()
    {
        echo "Falô :)\n";
    }

    public static function optionNotFound()
    {
        echo "Opção não encontrada\n";
    }

    public static function getData(string $string)
    {
        echo "Insira $string:";
    }

		/**
		 * Imprime as instruções baseando-se na classe passada
		 * @param string $class
		 */
		public static function operationInstructions(string $class)
    {
        switch($class)
        {
            case MultiplyLineThenSumBuilder::class:
                self::mltsconstructor();
                break;
        }
    }

    private static function mltsconstructor()
    {
        echo "Linha A corresponde à linha que será multiplicada e somada na Linha B\n";
    }

    public static function areYouSure()
    {
        echo "Deseja aplicar o resultado na matriz oficial? Y para sim, N para não: ";
    }

}