<?php

namespace App\ex02\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\ex02\Form\UserType;

class ex02 extends AbstractController
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

        return $this->render('@ex02/create_table.html.twig', [
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

    /**
     * @Route("/ex02/form", name="ex02_show_form")
     */
    public function showForm(Request $request): Response
    {
        $form = $this->createForm(UserType::class);
        $form->add('save', SubmitType::class, ['label' => 'Create User']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Insérer les données dans la base de données
            $conn = $this->getDatabaseConnection();
            $sql = "
                INSERT INTO users_ex02 (username, name, email, enable, birthdate, address) 
                VALUES (:username, :name, :email, :enable, :birthdate, :address)
                ON DUPLICATE KEY UPDATE
                username = VALUES(username), name = VALUES(name), email = VALUES(email),
                enable = VALUES(enable), birthdate = VALUES(birthdate), address = VALUES(address)
            ";

            $stmt = $conn->prepare($sql);
            try {
                $stmt->execute([
                    ':username' => $data['username'],
                    ':name' => $data['name'],
                    ':email' => $data['email'],
                    ':enable' => $data['enable'],
                    ':birthdate' => $data['birthdate']->format('Y-m-d H:i:s'),
                    ':address' => $data['address']
                ]);
                $message = 'User added/updated successfully!';
            } catch (\Exception $e) {
                $message = 'Error inserting user: ' . $e->getMessage();
            }

            return $this->render('@ex02/form.html.twig', [
                'form' => $form->createView(),
                'message' => $message,
            ]);
        }

        return $this->render('@ex02/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // Méthode getDatabaseConnection existante...

    /**
     * @Route("/ex02/users", name="ex02_show_users")
     */
    public function showUsers(): Response
    {
        $dbParams = [
            'host' => $this->host,
            'dbname' => $this->dbname,
            'charset' => 'utf8mb4',
            'user' => $this->user,
            'password' => $this->password,
        ];

        $conn = $this->getDatabaseConnection($dbParams);
        $sql = "SELECT * FROM users_ex02";

        try {
            $stmt = $conn->query($sql);
            $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $users = [];
            $message = 'Error fetching users: ' . $e->getMessage();
        }

        return $this->render('@ex02/users.html.twig', [
            'users' => $users,
        ]);
    }
}
