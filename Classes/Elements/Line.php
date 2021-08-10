<?php
declare(strict_types=1);

namespace Classes\Elements;

/**
 * Class Line
 * @package Classes\Elements
 */
class Line{

		protected const NUM_PAD = 5;

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
        $string = $this->toString();
        echo $string."\n";
    }

    public function fromArray(array $intArray)
		{
				foreach($intArray as $int)
				{
						$this->addElement($int);
				}
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
						$string .= str_pad("$element",self::NUM_PAD, ' ', STR_PAD_LEFT);
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

		/**
		 * Inverte o sinal de todos os elementos da linha
		 */
		public function invertElementsSignal()
		{
				foreach($this->elements as $key => $element)
				{
						$this->setElement($key, -1 * $element);
				}
		}

		/**
		 * @param int $key
		 * @param int $element
		 */
		private function setElement(int $key, int $element)
		{
				$this->elements[$key] = $element;
		}

		/**
		 * @param $int
		 */
		private function addElement($int)
		{
				$this->elements[] = $int;
		}

}