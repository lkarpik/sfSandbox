<?php

namespace App\Controller;

use App\Class\JSONPlaceholder;
use App\Entity\Author;
use App\Entity\BlogPost;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog_list')]
    public function index(ManagerRegistry $mr): Response
    {

        $blogPosts = $mr->getRepository(BlogPost::class)->findAll();
        $authors = $mr->getRepository(Author::class)->findAll();

        // $users = new JSONPlaceholder(HttpClient::create());
        // dd($users->getUsers());
        dd($_SERVER);
        // dump($blogPosts, $authors);
        return $this->render('blog/index.html.twig', [
            // 'blogs' => [
            //     'blog_1' => 'This is blog: ' . $this->generateUrl('lucky_me', ['name' => 'Hello Word'], UrlGeneratorInterface::ABSOLUTE_PATH),
            //     'blog_2' => 'This is second blog'
            // ]
            'blogs' => $blogPosts
        ]);
    }
}
