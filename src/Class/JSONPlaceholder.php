<?php

namespace App\Class;

use Symfony\Contracts\HttpClient\HttpClientInterface;


class JSONPlaceholder
{

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getUsers(): array
    {
        $responce = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/users');
        // $users = $responce->getContent();
        $users = $responce->toArray();

        return $users;
    }

    public function getPosts(): array
    {
        $responce = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/posts');
        $posts = $responce->toArray();

        return $posts;
    }
}
