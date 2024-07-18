<?php

namespace App\ex00\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;

class ex00 extends AbstractController
{
    /**
     * @Route("/create-table", name="create_table")
     */
    public function createTable(Connection $connection): Response
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT NOT NULL,
                username VARCHAR(255) NOT NULL UNIQUE,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                enable BOOLEAN NOT NULL,
                birthdate DATETIME NOT NULL,
                address LONGTEXT NOT NULL,
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;
        ";

        try {
            $connection->executeStatement($sql);
            $message = 'Table created successfully!';
        } catch (\Exception $e) {
            $message = 'Error creating table: ' . $e->getMessage();
        }

        return $this->render('@ex00/create_table.html.twig', [
            'message' => $message,
        ]);
    }
}
