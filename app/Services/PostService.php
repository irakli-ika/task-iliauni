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

    public function getPosts(): array
    {
        return $this->post->getPosts(); 
    }

    public function getPost($id): array
    {
        return $this->post->getPost($id); 
    }

    public function storePost($data): array
    {
        return $this->post->storePost($data); 
    }

    public function destroyPost($id): ?array
    {
        return $this->post->destroyPost($id); 
    }
}