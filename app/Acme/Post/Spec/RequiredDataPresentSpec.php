<?php
namespace Acme\Post\Spec;

use Acme\Core\Spec\AbstractValidationSpec;

class RequiredDataPresentSpec extends AbstractValidationSpec
{
    protected $rules = array(
        'title'         => 'required|min:2',
        'author_id'     => 'required|numeric',
        'slug'          => 'required|min:2|alpha_dash',
        'body'          => 'required',
        'status'        => 'required|numeric'
    );
}