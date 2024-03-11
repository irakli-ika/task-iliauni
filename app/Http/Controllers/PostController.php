<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Services\PostService;
use GuzzleHttp\Exception\ClientException;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {   
        try {

            $posts = $this->postService->getPosts();

            return view('index', compact('posts'));

        } catch(ClientException $e) {

            return 'Empty';

        }        
    }

    public function show($id)
    {   
        try {

            $post = $this->postService->getPost($id);

            return view('show', compact('post'));

        } catch(ClientException $e) {

            return abort(404);

        }
    }

    public function create()
    {
        return view('create');
    }

    public function store(PostStoreRequest $request)
    {
        try {

            $this->postService->storePost($request->validated());

            return redirect('/')->with('message', 'Post created successfully');

        } catch(ClientException $e) {

            return response()->json(['error' => 'An unexpected error occurred'], 500);

        }
    }

    public function destroy($id)
    {
        try {

            $this->postService->destroyPost($id);
            
            return redirect('/')->with('message', 'Post deleted successfully');

        } catch(ClientException $e) {

            return response()->json(['error' => 'An unexpected error occurred'], 500);

        }
    }
}