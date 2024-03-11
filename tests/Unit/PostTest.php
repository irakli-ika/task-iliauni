<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use App\Services\PostService;
use Tests\TestCase;
use App\Repositories\PostRepository;

class PostTest extends TestCase
{
    protected $postRepository;
    protected $postService;

    protected function setUp(): void
    {
        parent::setUp();

        $guzzleClient = new Client();

        $this->postRepository = new PostRepository($guzzleClient);

        $this->postService = new PostService($this->postRepository);
    }

    public function testGetPosts()
    {
        $posts = $this->postService->getPosts();

        $this->assertIsArray($posts);
    }

    public function testStorePost()
    {
        $data = ['name' => 'laravel', 'dody' => 'about us'];

        $post = $this->postService->storePost($data);

        $this->assertIsArray($post);
    }

    public function testDestroyPost()
    {
        $id = 5;

        $this->postService->destroyPost($id);

        $this->expectNotToPerformAssertions();
    }
    
}
