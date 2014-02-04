<?php

namespace Acme\Post;

interface PostRepositoryInterface
{

    public function all();

    public function findById($id);

    public function findBySlug($slug);

    public function findByAuthor($authorId);

    public function create(array $data);
}