<?php

namespace App\Controller;

use CarMaster\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class CompanyController extends AbstractController
{
    #[Route('/company/{id}', name: 'app_company')]
    public function index(string $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $company = $entityManager->getRepository(Company::class)->find($id);

        return $this->json($company->getFullInfo());
    }
}
