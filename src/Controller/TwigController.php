<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * prefixe de route defini pour la classe:
 * toutes les url des routes  definies dans ce controleur
 * sont prefixées par /twig
 * @Route("/twig")
 *
 */
class TwigController extends AbstractController
{
    /**
     * Avec le prefixe de route sur la classe, lurl de cette page
     * est /twig ou /twig/
     * @Route("/")
     */
    public function index()
    {
        return $this->render('twig/index.html.twig',
            [

        ]);
    }
}
