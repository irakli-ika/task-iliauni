<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PostStoreRequest;
use GuzzleHttp\Exception\ClientException;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(): View|Response
    {   
        try {

            $posts = $this->postService->getPosts();

            return view('index', compact('posts'));

        } catch(ClientException $e) {

            return 'Empty';

        }        
    }

    public function show($id): ?View
    {   
        try {
            
            $post = $this->postService->getPost($id);

            return view('show', compact('post'));

        } catch(ClientException $e) {

            return abort(404);

        }
    }

    public function create(): View
    {
        return view('create');
    }

    public function store(PostStoreRequest $request): RedirectResponse|JsonResponse
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
            // dd(gettype($this->postService->destroyPost($id)));
            $this->postService->destroyPost($id);
            
            return redirect('/')->with('message', 'Post deleted successfully');

        } catch(ClientException $e) {

            return response()->json(['error' => 'An unexpected error occurred'], 500);

        }
    }
}