<?php

namespace Acme\Core\Spec;

use Illuminate\Support\MessageBag;

abstract class AbstractSpec implements SpecInterface
{

    protected $messages;

    public function __construct()
    {
        $this->messages = new MessageBag;
    }

    public function messages()
    {
        return $this->messages;
    }

    public abstract function isSatisfiedBy($candidate);

    protected function clearMessages()
    {
        $this->messages = new MessageBag;
    }

    protected function addMessage($category, $message)
    {
        $this->messages->add($category, $message);
    }
}