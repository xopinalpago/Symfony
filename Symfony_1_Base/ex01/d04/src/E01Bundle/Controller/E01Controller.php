<?php

namespace App\E01Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class E01Controller extends AbstractController
{
    private $articles = [
        [
            'slug' => 'avion',
            'title' => 'Les Avions',
            'content' => 'Les avions sont des véhicules aériens... [Texte détaillé sur les avions]'
        ],
        [
            'slug' => 'bateau',
            'title' => 'Les Bateaux',
            'content' => 'Les bateaux sont des véhicules maritimes... [Texte détaillé sur les bateaux]'
        ],
        [
            'slug' => 'voiture',
            'title' => 'Les Voitures',
            'content' => 'Les voitures sont des véhicules terrestres... [Texte détaillé sur les voitures]'
        ],
    ];
    /**
     * @Route("/e01", name="e01")
    */
    public function articles(): Response
    {
        return $this->render('@E01/article_list.html.twig', [
            'articles' => $this->articles,
        ]);
    }

    /**
     * @Route("/e01/{slug}", name="article_show")
     */
    public function showArticle(string $slug): Response
    {
        $article = null;
        foreach ($this->articles as $item) {
            if ($item['slug'] === $slug) {
                $article = $item;
                break;
            }
        }

        if (!$article) {
            return $this->redirectToRoute('e01');
        }

        return $this->render('@E01/article.html.twig', [
            'title' => $article['title'],
            'article' => $article,
        ]);
    }
}
