<?php
declare(strict_types=1);

namespace Classes\Elements;

class Line{
    /**
     * @var int
     */
    protected $index;

    /**
     * @var array
     */
    protected $elements = [];

    public function __construct(int $index, array $elements)
    {
        $this->index = $index;
        $this->elements = $elements;
    }

    /**
     * Mostra a linha
     */
    public function print()
    {
        $this->showArray($this->elements);
    }

    private function showArray(array $array)
    {
        foreach($array as $element)
        {
            echo "$element ";
        }
        echo "\n";
    }

    public function toArray()
    {
        return $this->elements;
    }

    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param int $index
     * @return int
     */
    public function getElement(int $index)
    {
        return $this->elements[$index];
    }
}