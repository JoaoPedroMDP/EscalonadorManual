<?php
declare(strict_types=1);

namespace Classes\Exceptions;

use Exception;

class EndOfInput extends Exception
{
    public function __construct()
    {
        parent::__construct();
    }
}