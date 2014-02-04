<?php
namespace Acme\Post\Spec;

use Acme\Core\Spec\AbstractSpec;
use App;

class SlugIsUniqueSpec extends AbstractSpec
{
    
    protected $repo;

    public function __construct()
    {
        $this->repo = App::make('Acme\Post\PostRepositoryInterface');
        parent::__construct();
    }

    public function isSatisfiedBy($candidate)
    {
        $satisfied = true;
        $slug = $candidate->slug;
        $posts = $this->repo->findBySlug($slug); 
        if($posts->count() > 0) {
            $satisfied = false;
            $this->addMessage('slug', 'The post slug must be unique.');
        }
        return $satisfied;
    }
}