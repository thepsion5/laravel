<?php
namespace Acme\Core\Spec;

use App;

abstract class AbstractValidationSpec extends AbstractSpec
{
    protected $validator;

    protected $rules = array();

    protected $validationMessages = array();

    public function __construct()
    {
        $this->validator = App::make('Illuminate\Validation\Factory');
        parent::__construct();
    }

    public function isSatisfiedBy($candidate)
    {
        $data = $candidate->toArray();
        $validator = $this->validator->make($data, $this->rules, $this->validationMessages);
        $passed = $validator->passes();
        if(!$passed) {
            $this->messages = $validator->messages();
        } else {
            $this->clearMessages();
        }
        return $passed;
    }
}
