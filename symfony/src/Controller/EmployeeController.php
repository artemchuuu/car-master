<?php

namespace App\Controller;

use CarMaster\Entity\Employee;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EmployeeController extends AbstractController
{
    #[Route('/employee/{id}', name: 'app_employee')]
    public function index(int $id, EntityManagerInterface $entityManager): Response
    {
        $employee = $entityManager->getRepository(Employee::class)->find($id);

        return new JsonResponse($employee->getName());
    }
}
