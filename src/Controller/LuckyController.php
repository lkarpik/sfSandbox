<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    #[Route('/number', name: 'lucky_me', methods: ['GET'])]
    public function index(): Response
    {
        $name = 'Lucky Me';

        return $this->render('number/number.html.twig', [
            'name' => $name
        ]);
    }
}
