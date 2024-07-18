<?php

namespace App\ex01\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ex01 extends AbstractController
{
    /**
     * @Route("/ex01/create-table", name="create_table")
     */
    public function createTable(EntityManagerInterface $entityManager): Response
    {
        $schemaTool = new SchemaTool($entityManager);
        $metadata = $entityManager->getClassMetadata(\App\Entity\User::class);

        try {
            $schemaTool->updateSchema([$metadata], true);
            $message = 'La table a été créée avec succès.';
        } catch (\Exception $e) {
            $message = 'Une erreur est survenue : ' . $e->getMessage();
        }

        return $this->render('@ex01/create_table.html.twig', [
            'message' => $message,
        ]);
    }
}