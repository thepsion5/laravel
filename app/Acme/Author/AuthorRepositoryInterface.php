<?php
namespace Acme\Author;

interface AuthorRepositoryInterface
{
    public function findById($id);
}