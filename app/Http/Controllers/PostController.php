<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {   
        $posts = $this->postService->getPosts();

        return view('index', compact('posts'));
    }

    public function show($id)
    {   
        $post = $this->postService->getPost($id);

        return view('show', compact('post'));
    }
}
