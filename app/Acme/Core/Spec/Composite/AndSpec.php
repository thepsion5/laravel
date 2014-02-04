<?php
namespace Acme\Core\Spec\Composite;

class AndSpec extends AbstractCompositeSpec
{
    public function isSatisfiedBy($candidate)
    {
        $satisfied = true;
        foreach($this->specs as $spec) {
            if(!$spec->isSatisfiedBy($candidate)) {
                $satisfied = false;
            }
        }
        return $satisfied;
    }
}