<?php
namespace Acme\Post\Spec;

use Acme\Core\Spec\AbstractValidationSpec;
use App;

class AuthorExistsSpec extends AbstractValidationSpec
{

    protected $author;

    public function __construct()
    {
        $this->author = App::make('Acme\Author\AuthorRepositoryInterface');
        parent::__construct();
    }

    public function isSatisfiedBy($candidate)
    {
        $satisfied = true;

        $author = $this->author->findById($candidate->author_id);
        if(!$author) {
            $this->addMessage('author_id', 'Unable to find an author with this ID.');
            $satisfied = false;
        } else {
            $this->clearMessages();
        }
        return $satisfied;
    }
}