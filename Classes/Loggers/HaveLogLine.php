<?php
declare(strict_types=1);

namespace Classes\Loggers;

/**
 * Class HaveLogLine
 * @package Classes\Loggers
 */
abstract class HaveLogLine {

		/**
		 * @return string
		 */
		protected abstract function getLogLine(): string;
}