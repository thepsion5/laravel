<?php
namespace Acme\Core\Spec\Composite;

use Acme\Core\Spec\AbstractSpec;
use Acme\Core\Spec\SpecInterface;

abstract class AbstractCompositeSpec extends AbstractSpec
{
    protected $specs = array();

    public function __construct(SpecInterface $spec1, SpecInterface $spec2)
    {
        $this->with($spec1)->with($spec2);
        parent::__construct();
    }

    public function with(SpecInterface $spec)
    {
        $this->specs[] = $spec;

        return $this;
    }

    protected function compileMessages()
    {
        $this->clearMessages();
        foreach($this->specs as $spec) {
            $this->messages->merge($spec->messages()->toArray());
        }
    }

    public function messages()
    {
        $this->compileMessages();
        return parent::messages();
    }
}