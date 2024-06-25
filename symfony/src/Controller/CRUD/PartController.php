<?php

declare(strict_types=1);

namespace App\Controller\CRUD;

use App\Repository\PartRepository;
use CarMaster\Entity\Part;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;

use Symfony\Component\Routing\Attribute\Route;

use const FILTER_VALIDATE_REGEXP;

final class PartController extends AbstractController
{
    #[Route('/parts', name: 'app_crud_part_index', methods: ['GET'])]
    public function index(
        PartRepository $part,
        #[MapQueryParameter(
            filter: FILTER_VALIDATE_REGEXP,
            options: ['regexp' => '/^[1-9][0-9]+$/']
        )]
        int $page = 1,
    ): Response {
        return $this->render('crud/parts/index.html.twig', [
            'part' => $part->findPage(max(1, $page)),
        ]);
    }

    #[Route('parts/{id}', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Part $part): Response
    {
        return $this->render('crud/parts/show.html.twig', ['part' => $part]);
    }

    #[Route('parts/{id}/_delete')]
    public function delete(Part $part, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($part);
        $entityManager->flush();

        $this->addFlash('success', 'Part deleted.');

        return $this->redirectToRoute('app_crud_home_index');
    }
}