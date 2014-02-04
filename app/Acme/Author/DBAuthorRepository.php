<?php
namespace Acme\Author;

class DBAuthorRepository implements AuthorRepositoryInterface
{
    protected $model;

    public function __construct(Author $authorModel)
    {
        $this->model = $authorModel;
    }

    public function findById($authorId)
    {
        return $this->model->find($authorId);
    }
}