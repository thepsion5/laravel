<?php

use Acme\Post\PostRepositoryInterface;
use Acme\Core\Exceptions\ValidationException;

class PostController extends BaseController
{

    protected $repo;

    public function __construct(PostRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function getIndex()
    {
        return $this->repo->all();
    }

    public function getAuthor($authorId)
    {
        return $this->repo->findByAuthor($authorId);
    }

    public function getCreate()
    {
        return View::make('post.create');
    }

    public function postCreate()
    {
        $input = Input::all();
        try {
            $this->repo->create($input);
        } catch(ValidationException $e) {
            Session::flash('message', $e->getMessage());
            return Redirect::back()->withErrors($e->getValidationErrors())->withInput();
        }
        Session::flash('message', 'Post Created Successfully!');
        return Redirect::back();
    }
}