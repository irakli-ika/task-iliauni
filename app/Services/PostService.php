<?php

namespace App\Services;

use App\Repositories\PostRepositoryInterface;

class PostService
{
    protected $post;

    public function __construct(PostRepositoryInterface $post)
    {
        return $this->post = $post;
    }

    public function getPosts()
    {
        return $this->post->getPosts(); 
    }

    public function getPost($id)
    {
        return $this->post->getPost($id); 
    }
}