<?php
namespace Acme\Post;

use Acme\Core\BaseModel;

class Post extends BaseModel
{
    public $guarded = array('id');

    public $hidden = array('created_at', 'updated_at', 'deleted_at');

    const DELETED    = -1;
    const DRAFTED    = 1;
    const PUBLISHED  = 2;
}