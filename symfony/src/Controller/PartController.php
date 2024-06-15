<?php

namespace App\Controller;

use CarMaster\Entity\Part;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class PartController extends AbstractController
{
    #[Route('/part', name: 'app_part')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PartController.php',
        ]);
    }

    #[Route('/part/{name}/{price}', name: 'app_part')]
    public function create(float $price, string $name, EntityManagerInterface $entityManager): JsonResponse
    {
        $part = new Part();
        $part->setName($name);
        $part->setPrice($price);

        $entityManager->persist($part);
        $entityManager->flush();

        return $this->json([$part]);
    }
}
