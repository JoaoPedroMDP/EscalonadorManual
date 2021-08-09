<?php
declare(strict_types=1);

namespace Classes\Elements;


/**
 * Class Matrix
 * @package Classes\Elements
 */
class Matrix{

    /**
     * @var Line[]
     */
    protected $lines = [];

		/**
		 * @param array $matrix
		 */
		public function __construct(array $matrix)
    {
        foreach($matrix as $index => $line)
        {
            $this->lines[] = new Line($index, $line);
        }
    }

    /**
     * Mostra a matriz
     */
    public function print()
    {
        foreach ($this->lines as $line)
        {
            $line->print();
        }
    }

    /**
     * @param int $lineIndex
     * @return Line
     */
    public function getLineFromUserInput(int $lineIndex): Line
		{
        return $this->lines[--$lineIndex];
    }

		/**
		 * @param int $lineIndex
		 * @return Line
		 */
		public function getLine(int $lineIndex): Line
		{
				return $this->lines[$lineIndex];
		}

		/**
		 * @param Line $line
		 * @param int $index
		 */
		public function setLine(Line $line, int $index)
    {
        $this->lines[$index] =$line;
    }


		/**
		 * @return string
		 */
		public function toString(): string
		{
				$string = '';

				foreach($this->lines as $line)
				{
						$string .= "\n";
						$string .= $line->toString();
				}

				return $string;
		}

		/**
		 * @param int $lineIndex
		 * @return string
		 */
		public function lineToString(int $lineIndex): string
		{
				return $this->getLine($lineIndex)->toString();
		}

		/**
		 * @return int
		 */
		public function getLineCount(): int
		{
				return count($this->lines);
		}

		/**
		 * @param int $i
		 * @return bool
		 */
		public function isLastLine(int $i): bool
		{
				return $i == ($this->getLineCount()) - 1;
		}
}