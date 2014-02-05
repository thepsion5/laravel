<?php
namespace Acme\Core\Spec;

class StubSpec extends AbstractSpec
{
    public function isSatisfiedBy($candidate)
    {
        return true;
    }

    public function stubAddMessage($category, $message)
    {
        return $this->addMessage($category, $message);
    }

    public function stubClearMessages()
    {
        return $this->clearMessages();
    }
}