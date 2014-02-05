<?php
namespace Acme\Core\Spec;

class StubValidationSpec extends AbstractValidationSpec
{

    public function stubSetRules(array $rules)
    {
        $this->rules = $rules;
    }

    public function stubSetValidationMessages(array $messages)
    {
        $this->validationMessages = $messages;
    }
}