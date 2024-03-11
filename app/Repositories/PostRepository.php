<?php

namespace App\Repositories;

use GuzzleHttp\Client;

class PostRepository implements PostRepositoryInterface
{
    protected $client;
    protected $baseUrl;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->baseUrl = 'https://jsonplaceholder.typicode.com/posts';
    }


    public function getPosts()
    {
        $response = $this->client->get($this->baseUrl);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getPost($id)
    {
        $response = $this->client->get($this->baseUrl . '/' . $id);
        
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createPost(array $data)
    {
        $response = $this->client->post($this->baseUrl, [
            'json' => $data,
        ]);
        
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updatePost($id, array $data)
    {
        
    }

    public function deletePost($id)
    {
        
    }
}