<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class PostRepository implements PostRepositoryInterface
{
    protected $client;
    protected $baseUrl;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->baseUrl = 'https://jsonplaceholder.typicode.com/posts';
    }

    public function getPosts(): array
    {
        if (Cache::has('posts')) {

            return Cache::get('posts');
            
        }

        $response = $this->client->get($this->baseUrl);
        
        $posts = json_decode($response->getBody()->getContents(), true);

        Cache::put('posts', $posts, 300);

        return $posts; 
    }

    public function getPost($id): array
    {
        $response = $this->client->get($this->baseUrl . '/' . $id);
        
        return json_decode($response->getBody()->getContents(), true);
    }

    public function storePost(array $data) : array
    {
        $response = $this->client->post($this->baseUrl, [
            'json' => $data,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function destroyPost($id): void
    {
        $this->client->delete($this->baseUrl . '/' . $id);
    }
}