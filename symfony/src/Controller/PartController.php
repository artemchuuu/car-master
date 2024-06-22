<?php

namespace App\Controller;

use CarMaster\Manager\PartManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class PartController extends AbstractController
{
    #[Route('/part/{name}/{price}', name: 'app_part_create')]
    public function create(float $price, string $name, PartManager $partManager): JsonResponse
    {
        return new JsonResponse([$partManager->createPart($name, $price)->getFullInfo()]);
    }
}
