<?php
namespace Acme\Core\Spec\Composite;

class OrSpec extends AbstractCompositeSpec
{
    public function isSatisfiedBy($candidate)
    {
        $satisfied = false;
        foreach($this->specs as $spec) {
            if($spec->isSatisfiedBy($candidate)) {
                $satisfied = true;
                break;
            }
        }
        return $satisfied;
    }
}