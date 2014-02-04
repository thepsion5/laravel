<?php
namespace Acme\Core\Repo;

use Acme\Core\Exceptions\ValidationException;
use Acme\Core\Spec\SpecInterface;

abstract class AbstractEloquentRepo
{
    
    protected function validateFromSpec(SpecInterface $spec, $candidate, $messageOnFailure)
    {
        if(!$spec->isSatisfiedBy($candidate)) {
            $exception = new ValidationException($messageOnFailure);
            $exception->setValidationErrors($spec->messages());
            throw $exception;
        }
    }
}