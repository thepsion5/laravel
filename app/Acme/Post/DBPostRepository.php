<?php
namespace Acme\Post;

use Acme\Core\Exceptions\ValidationException;
use Acme\Core\Repo\AbstractEloquentRepo;

class DBPostRepository extends AbstractEloquentRepo implements PostRepositoryInterface
{
    protected $model;

    public function __construct(Post $postModel)
    {
        $this->model = $postModel;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function findBySlug($slug)
    {
        return $this->model->whereSlug($slug)->get();
    }

    public function findByAuthor($authorId)
    {
        return $this->model->whereAuthorId($authorId)->get();
    }

    public function create(array $data)
    {
        $creatable = new Spec\CanBeCreatedSpec();
        $post = new Post();
        $post->fill($data);

        $this->validateFromSpec($creatable, $post, 'Unable to create Post. Please check your information and try again.');
        return $post;
    }
}