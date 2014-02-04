<?php
namespace Acme\Core\Spec;

interface SpecInterface
{
    public function isSatisfiedBy($object);

    public function messages();
}