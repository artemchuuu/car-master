<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_crud_home_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'name' => 'Artem'
        ]);
    }
}
