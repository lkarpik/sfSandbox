<?php

namespace App\DataFixtures;

use App\Class\JSONPlaceholder;
use App\Entity\Author;
use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostsFixtures extends Fixture
{

    private $json;

    public function __construct(JSONPlaceholder $json)
    {
        $this->json = $json;
    }
    public function load(ObjectManager $manager): void
    {

        // $posts = $this->json->getPosts();

        // foreach ($posts as $post) {
        //     $blogPost = new BlogPost();
        //     $blogPost->setName($post['title']);
        //     $blogPost->setBody($post['body']);

        //     $manager->persist($blogPost);
        // }

        // $manager->flush();
    }
}
