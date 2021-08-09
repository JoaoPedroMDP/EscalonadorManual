<?php
declare(strict_types=1);

namespace Classes\Elements;


class Matrix{

    /**
     * @var Line[]
     */
    protected $lines = [];

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
    public function getLineFromUserInput(int $lineIndex)
    {
        return $this->lines[--$lineIndex];
    }

    public function setLine(Line $line, int $index)
    {
        $this->lines[$index] =$line;
    }
}