<?php
namespace Acme\Core\Exceptions;

use Exception;
use Illuminate\Support\MessageBag;

class ValidationException extends Exception
{
    protected $errors;

    public function __construct($message = '', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errors = new MessageBag;
    }

    public function setValidationErrors($errors)
    {
        $this->errors = $errors;
    }

    public function getValidationErrors()
    {
        return $this->errors;
    }

    public function __toString()
    {
        $output = array();
        $output[] = parent::__toString();
        $output[] = 'Validation Errors:';
        $output[] = $this->errors;
        return implode("\n", $output);
    }
}