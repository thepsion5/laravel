<?php
namespace Acme\Core\Spec\Composite;

class NotSpec extends AbstractCompositeSpec
{
    protected $spec;

    public function __construct(SpecInterface $spec)
    {
        parent::__construct($spec, $spec);
    }

    public function with(SpecInterface $spec)
    {
        $this->spec = $spec;
    }

    public function isSatisfiedBy($candidate)
    {
        return !$this->spec->isSatisfiedBy($candidate);
    }
}