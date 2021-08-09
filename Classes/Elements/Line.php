<?php
declare(strict_types=1);

namespace Classes\Elements;

/**
 * Class Line
 * @package Classes\Elements
 */
class Line{
    /**
     * @var int
     */
    protected $index;

    /**
     * @var array
     */
    protected $elements = [];

		/**
		 * @param int $index
		 * @param array $elements
		 */
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

		/**
		 * @param array $array
		 */
		private function showArray(array $array)
    {
        foreach($array as $element)
        {
            echo "$element ";
        }
        echo "\n";
    }

		/**
		 * @return array
		 */
		public function toArray(): array
		{
        return $this->elements;
    }

    /**
     * @return int
     */
    public function getIndex(): int
		{
        return $this->index;
    }

    /**
     * @param int $index
     * @return int
     */
    public function getElement(int $index): int
		{
        return $this->elements[$index];
    }

		/**
		 * toString
		 * @return string
		 */
		public function toString(): string
		{
				$string = '';
				foreach($this->elements as $key => $element)
				{
						$string .= "$element";
						if(!$this->isLastElement($key))
						{
								$string .= " ";
						}
				}
				return $string;
		}

		/**
		 * @param int $key
		 * @return bool
		 */
		private function isLastElement(int $key): bool
		{
				return ++$key == count($this->elements);
		}
}