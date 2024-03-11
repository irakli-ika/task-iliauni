<?php

namespace App\Repositories;

interface PostRepositoryInterface
{
    public function getPosts();
    public function getPost($id);
    public function storePost(array $data);
    public function destroyPost($id);
}