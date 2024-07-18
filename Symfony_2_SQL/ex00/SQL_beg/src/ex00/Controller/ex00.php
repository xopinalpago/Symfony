<?php

namespace App\ex00\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ex00 extends AbstractController
{
    private $host;
    private $port;
    private $dbname;
    private $user;
    private $password;

    public function __construct(string $host, string $port, string $dbname, string $user, string $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @Route("/create-table", name="create_table")
     */
    public function createTable(): Response
    {
        $dbParams = [
            'host' => $this->host,
            'dbname' => $this->dbname,
            'charset' => 'utf8mb4',
            'user' => $this->user,
            'password' => $this->password,
        ];

        $conn = $this->getDatabaseConnection($dbParams);

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
            $conn->exec($sql);
            $message = 'Table created successfully!';
        } catch (\Exception $e) {
            $message = 'Error creating table: ' . $e->getMessage();
        }

        return $this->render('@ex00/create_table.html.twig', [
            'message' => $message,
        ]);
    }

    private function getDatabaseConnection(array $dbParams)
    {
        // Créer une connexion PDO à la base de données
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $dbParams['host'], $dbParams['dbname'], $dbParams['charset']);
        $username = $dbParams['user'];
        $password = $dbParams['password'];
        return new \PDO($dsn, $username, $password);
    }
}
