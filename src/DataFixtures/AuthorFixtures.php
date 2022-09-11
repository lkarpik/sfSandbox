<?php

namespace App\DataFixtures;

use App\Class\JSONPlaceholder;
use App\Entity\Author;
use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{

    private $json;

    public function __construct(JSONPlaceholder $json)
    {
        $this->json = $json;
    }
    public function load(ObjectManager $manager): void
    {

        // $responce = new JSONPlaceholder(HttpClient::create());
        // $authors =  $responce->getUsers();
        $users = $this->json->getUsers();
        $posts = $this->json->getPosts();

        // for ($i = 0; $i < 10; $i++) {
        //     $author = new Author();
        //     $author->setName('Mariano Italiano_' . $i);
        //     $manager->persist($author);
        // }

        foreach ($users as $user) {

            $author = new Author();
            $author->setName($user['name']);
            $manager->persist($author);
            $this->setReference('author', $author);

            foreach ($posts as $post) {

                $blogPost = new BlogPost();
                $blogPost->setBody($post['body']);
                $blogPost->setName($post['title']);
                // $blogPost->setAuthor($author);
                $blogPost->setAuthor($this->getReference('author'));
                $manager->persist($blogPost);
            }
        }

        $manager->flush();
    }
}
