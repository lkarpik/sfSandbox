<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog_list')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'blogs' => [
                'blog_1' => 'This is blog: ' . $this->generateUrl('lucky_me', ['name' => 'Hello Word'], UrlGeneratorInterface::ABSOLUTE_PATH),
                'blog_2' => 'This is second blog'
            ]
        ]);
    }
}
