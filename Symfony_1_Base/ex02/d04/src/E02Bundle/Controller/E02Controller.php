<?php

namespace App\E02Bundle\Controller;

use App\E02Bundle\Form\MessageFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class E02Controller extends AbstractController
{
    /**
     * @Route("/e02", name="e02")
    */
    public function messageForm(Request $request): Response
    {
        $form = $this->createForm(MessageFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Handle form submission (e.g., save data, send email, etc.)
            $data = $form->getData();
            // For demonstration purposes, we'll just render the data on a new page.
            return $this->render('@E02/form_success.html.twig', [
                'data' => $data,
            ]);
        }

        return $this->render('@E02/message_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
