<?php

namespace App\E03Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class E03Controller extends AbstractController
{
    /**
     * @Route("/e03", name="e03")
     */
    public function index()
    {
        $numberOfColors = $this->getParameter('e03.number_of_colors');
        if ($numberOfColors <= 0) {
            // Afficher un message d'erreur si le nombre de couleurs est négatif ou nul
            return $this->render('@E03/error.html.twig', [
                'error' => 'Le nombre de nuances doit être un entier positif.'
            ]);
        }

        $colors = ['black', 'red', 'blue', 'green'];
        $shades = [];

        foreach ($colors as $color) {
            $shades[$color] = $this->generateShades($color, $numberOfColors);
        }

        return $this->render('@E03/colors.html.twig', [
            'shades' => $shades,
            'numberOfColors' => $numberOfColors
        ]);
    }

    private function generateShades($color, $numberOfColors)
    {
        $shades = [];
        for ($i = 0; $i < $numberOfColors; $i++) {
            $shade = $this->getShade($color, $i, $numberOfColors);
            $shades[] = $shade;
        }
        return $shades;
    }


    private function getShade($color, $index, $total)
    {
        if ($total == 1) {
            switch ($color) {
                case 'black':
                    return 'rgb(0, 0, 0)';
                case 'red':
                    return 'rgb(255, 0, 0)';
                case 'blue':
                    return 'rgb(0, 0, 255)';
                case 'green':
                    return 'rgb(0, 255, 0)';
                default:
                    return 'rgb(255, 255, 255)';
            }
        }
        $ratio = $index / ($total - 1);
        switch ($color) {
            case 'black':
                $r = $g = $b = (int)(255 * $ratio);
                break;
            case 'red':
                $r = 255;
                $g = $b = (int)(255 * $ratio);
                break;
            case 'blue':
                $b = 255;
                $r = $g = (int)(255 * $ratio);
                break;
            case 'green':
                $g = 255;
                $r = $b = (int)(255 * $ratio);
                break;
            default:
                $r = $g = $b = 255;
                break;
        }
        return "rgb($r, $g, $b)";
    }
}
