<?php

namespace App\Repositories;

interface PostRepositoryInterface
{
    public function getPosts();
    public function getPost($id);
    public function createPost(array $data);
    public function updatePost($id, array $data);
    public function deletePost($id);
}