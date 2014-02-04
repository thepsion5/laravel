<?php
namespace Acme\Author;

use Acme\Core\BaseModel;

class Author extends BaseModel
{
    public $guarded = array('id', 'password', 'username');

    public $hidden = array('created_at', 'updated_at', 'deleted_at', 'password');
}