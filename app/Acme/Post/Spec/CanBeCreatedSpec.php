<?php
namespace Acme\Post\Spec;

use Acme\Core\Spec\Composite\AndSpec;

class CanBeCreatedSpec extends AndSpec
{
    public function __construct()
    {
        $authorExists = new AuthorExistsSpec;
        $requiredData = new RequiredDataPresentSpec;
        $uniqueSlug = new SlugIsUniqueSpec;

        $this->with($uniqueSlug);
        parent::__construct($authorExists, $requiredData);
    }
}