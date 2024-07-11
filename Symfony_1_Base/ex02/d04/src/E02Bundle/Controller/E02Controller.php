<?php

namespace App\E02Bundle\Controller;

use App\E02Bundle\Form\MessageFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class E02Controller extends AbstractController
{
    private $messageStorageFile;

    public function __construct(string $messageStorageFile)
    {
        $this->messageStorageFile = $messageStorageFile;
    }

    /**
     * @Route("/e02", name="e02")
    */
    public function messageForm(Request $request): Response
    {
        // Récupérer les données de la session
        $session = $request->getSession();
        $formData = $session->get('formData', [
            'message' => '', // Par défaut
            'include_timestamp' => 'no', // Par défaut
        ]);

        $form = $this->createForm(MessageFormType::class, $formData);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Sauvegarder les données dans la session
            $session->set('formData', $data);

            // Récupérer le message
            $message = $data['message'];

            // Vérifier si on doit inclure le timestamp
            $includeTimestamp = ($data['include_timestamp'] === 'yes');
            
            // Construire la ligne à écrire dans le fichier
            if ($includeTimestamp) {
                $line = $message . ' ' . date('Y-m-d H:i:s');
            } else {
                $line = $message;
            }

            // Chemin vers le fichier où écrire les données (par exemple)
            $filePath = $this->getParameter('kernel.project_dir') . '/' . $this->messageStorageFile;

            // Écrire la ligne dans le fichier
            file_put_contents($filePath, $line . PHP_EOL, FILE_APPEND);

            // Redirection vers la page du formulaire
            return $this->redirectToRoute('e02');
        }

        // Récupérer la dernière ligne du fichier texte
        $lastLine = '';
        $filePath = $this->getParameter('kernel.project_dir') . '/' . $this->messageStorageFile;
        if (file_exists($filePath)) {
            $lines = file($filePath);
            $lastLine = end($lines);
        }

        return $this->render('@E02/message_form.html.twig', [
            'form' => $form->createView(),
            'last_line' => $lastLine,
        ]);
    }

    /**
     * @Route("/e02/success", name="e02_message_form_success")
     */
    public function success(): Response
    {
        // Page de succès après l'enregistrement
        return $this->render('@E02/form_success.html.twig');
    }
}
