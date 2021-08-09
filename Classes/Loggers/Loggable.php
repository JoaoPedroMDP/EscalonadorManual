<?php
declare(strict_types=1);

namespace Classes\Loggers;

use Classes\Elements\Matrix;
use Exception;

/**
 * Class Loggable
 * @package Classes\Loggers
 */
abstract class Loggable{

		public const STANDARD_SPACING= 25;
		public const FILE_NAME= "historico.txt";

		/**
		 * Nome do arquivo para gerar o log
		 * @var resource
		 */
		private $file;

		/**
		 * @throws Exception
		 */
		public function __construct()
		{
				$fileDescriptor = fopen(self::FILE_NAME, 'w+');
				if($fileDescriptor === false)
				{
						throw new Exception("Não foi possível criar o arquivo para escrita do log de atividades");
				}

				$this->file = $fileDescriptor;
		}

		/**
		 * @return string
		 */
		private function generateSpacing(): string
		{
				return str_repeat(' ', self::STANDARD_SPACING);
		}

		/**
		 * Fecha o arquivo antes do objeto ser destruído
		 */
		public function __destruct()
		{
				fclose($this->file);
		}

		/**
		 * @param Matrix $matrixA
		 * @param string $operationLog
		 * @param Matrix $matrixB
		 */
		protected function log(Matrix $matrixA, string $operationLog, Matrix $matrixB)
		{
				$logLine = $this->createLogLine($matrixA, $operationLog, $matrixB);
				file_put_contents(self::FILE_NAME, $logLine, FILE_APPEND);
		}

		/**
		 * @param Matrix $matrixA
		 * @param string $operationLog
		 * @param Matrix $matrixB
		 * @return string
		 */
		private function createLogLine(Matrix $matrixA, string $operationLog, Matrix $matrixB): string
		{
				$spacing = $this->generateSpacing();
				$logLine = '';
				for( $i = 0 ; $i < $matrixA->getLineCount(); $i++ )
				{
						$middleContent = $matrixA->isLastLine($i)? $this->justifyContent($operationLog, $spacing) : $spacing;
						$logLine .= $matrixA->lineToString($i) . $middleContent . $matrixB->lineToString($i) . "\n";
				}

				return $logLine;
		}

		/**
		 * @return string
		 */
		protected abstract function getLogLine(): string;

		/**
		 * @param string $operationLog
		 * @param string $spacing
		 * @return string
		 */
		private function justifyContent(string $operationLog, string $spacing): string
		{
				$numberOfSpacesRemaining = strlen($spacing) - strlen($operationLog);
				$even = ($numberOfSpacesRemaining % 2 == 0);
				$numberOfSpacesToConcatenate = intdiv($numberOfSpacesRemaining, 2);
				$prefix = str_repeat(' ', $numberOfSpacesToConcatenate);

				$suffix = !$even ?
						str_repeat(' ', $numberOfSpacesToConcatenate):
						str_repeat(' ', $numberOfSpacesToConcatenate++);

				return $prefix.$operationLog.$suffix;
		}

}