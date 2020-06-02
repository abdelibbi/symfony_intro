<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     *
     * @Route("/hello-world")
     */
    public function hello()
    {
        return $this->render('index/hello.html.twig');
    }

    /**
     * Partie variable de l'url entre accolade:
     * la route matche /bonjour/julien et /bonjour/ben
     * le $qui en parametre de la methode contient la valeur
     * de la partie variable {qui} de l'url
     *
     * @Route ("/bonjour/{qui}")
     */
    public function bonjour($qui)
    {
        return $this->render('index/bonjour.html.twig',
        //passe au template une variable qui sappelle nom
        //et qui a la valeur de $qui
        [
            'nom'=> $qui
        ]
        );
    }

    /**
     *
     * la route matche /salut/julien
     * et /salut/ ou /salut
     * si qui na pas de valeur $qui vaut "à toi"
     *
     * @Route("/salut/{qui}", defaults={"qui": "à toi"})
     */
    public function salut($qui)
    {
        return $this->render(
            'index/salut.html.twig',
            [
                'qui' => $qui
            ]
        );
    }

    /**
     * une route avec 2 parties variables dont une est optionnelle
     * @Route("/coucou/{prenom}-{nom}", defaults={"nom": ""})
     */
    public function coucou($prenom, $nom)
    {
       $nomcomplet = rtrim($prenom . ' '. $nom);
       return $this->render(
           'index/coucou.html.twig',
          [
              'nom' => $nomcomplet
          ]
       );
    }

    /**
     * id doit etre un nombre (\d+ en exprression reguliere)
     * @Route("/utilisateur/modification/{id}", requirements={"id": "\d+"})
     */
    public function userEdit($id)
    {
        return $this->render('index/user_edit.html.twig',
        [
            'id' => $id
        ]
        );

    }
}
